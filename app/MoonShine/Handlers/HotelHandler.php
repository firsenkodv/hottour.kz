<?php
namespace App\MoonShine\Handlers;

use App\Jobs\HotelImportJob;
use MoonShine\Contracts\Fields\HasDefaultValue;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Exceptions\ActionException;
use MoonShine\Fields\Field;
use MoonShine\Handlers\ImportHandler;
use MoonShine\MoonShineUI;
use MoonShine\Notifications\MoonShineNotification;
use OpenSpout\Common\Exception\IOException;
use OpenSpout\Common\Exception\UnsupportedTypeException;
use OpenSpout\Reader\Exception\ReaderNotOpenedException;
use Rap2hpoutre\FastExcel\FastExcel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Collection;


class HotelHandler extends  ImportHandler
{
    public function handle(): Response
    {
        if (! request()->hasFile($this->getInputName())) {
            MoonShineUI::toast(
                __('moonshine::ui.resource.import.file_required'),
                'error'
            );

            return back();
        }

        $requestFile = request()->file($this->getInputName());

        if (! in_array(
            $requestFile->getClientOriginalExtension(),
            ['csv', 'xlsx']
        )) {
            MoonShineUI::toast(
                __('moonshine::ui.resource.import.extension_not_supported'),
                'error'
            );

            return back();
        }

        if (! $this->hasResource()) {
            throw ActionException::resourceRequired();
        }

        $this->resolveStorage();

        $path = request()->file($this->getInputName())->storeAs(
            $this->getDir(),
            str_replace('.txt', '.csv', (string) $requestFile->hashName()),
            $this->getDisk()
        );

        $path = Storage::disk($this->getDisk())
            ->path($path);

        if ($this->isQueue()) {
            HotelImportJob::dispatch(
                $this->getResource()::class,
                $path,
                $this->deleteAfter,
                $this->getDelimiter()
            );

            MoonShineUI::toast(
                __('moonshine::ui.resource.queued')
            );

            return back();
        }

        self::process(
            $path,
            $this->getResource(),
            $this->deleteAfter,
            $this->getDelimiter()
        );

        MoonShineUI::toast(
            __('moonshine::ui.resource.import.imported'),
            'success'
        );

        return back();
    }

    /**
     * @throws IOException
     * @throws UnsupportedTypeException
     * @throws ReaderNotOpenedException
     */
    public static function process(
        string $path,
        ResourceContract $resource,
        bool $deleteAfter = false,
        string $delimiter = ','
    ): Collection {
        $fastExcel = new FastExcel();

        if (str($path)->contains('.csv')) {
            $fastExcel->configureCsv($delimiter);
        }

        $result = $fastExcel->import($path, function ($line) use ($resource) {
            $data = collect($line)->mapWithKeys(
                function ($value, $key) use ($resource): array {
                    $field = $resource->getFields()->onlyFields()->importFields()->first(
                        fn (Field $field): bool => $field->column() === $key || $field->label() === $key
                    );

                    if (! $field instanceof Field) {
                        return [];
                    }

                    if (empty($value)) {
                        $value = $field instanceof HasDefaultValue
                            ? $field->getDefault()
                            : ($field->isNullable() ? null : $value);
                    }

                    $value = is_string($value) && str($value)->isJson()
                        ? json_decode($value, null, 512, JSON_THROW_ON_ERROR)
                        : $value;

                    return [$field->column() => $value];
                }
            )->toArray();

            if (($data[$resource->getModel()->getKeyName()] ?? '') === '') {
                unset($data[$resource->getModel()->getKeyName()]);
            }

            if ($data === []) {
                return false;
            }

            $item = isset($data[$resource->getModel()->getKeyName()])
                ? $resource->getModel()
                    ->newModelQuery()
                    ->findOrNew($data[$resource->getModel()->getKeyName()])
                : $resource->getModel();

            $item->forceFill($data);

            return $item->save();
        });

        if ($deleteAfter) {
            unlink($path);
        }

        MoonShineNotification::send(
            trans('moonshine::ui.resource.import.imported')
        );

        return $result;
    }


}
