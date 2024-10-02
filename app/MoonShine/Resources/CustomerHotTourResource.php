<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Travelitem;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerHotTour;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<CustomerHotTour>
 */
class CustomerHotTourResource extends ModelResource
{
    protected string $model = CustomerHotTour::class;

    protected string $title = 'CustomerHotTours';

    protected string $column = 'sorting';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function getShowPage() {
        $items = Travelitem::query()->select('id', 'title', 'travelcategory_id')->where('published', 1)->get();
        $a[0]  = 'Обязательно к заполнению';

        foreach ($items as $item) {
           $a[$item->id] = $item->title . ' | ' . $item->parent->title;
       }
        return $a;
    }

    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Image::make(__('Изображение'), 'img'),
            Text::make('Заголовок', 'title'),
            Text::make(__('Вылет'), 'cityname'),
            Text::make(__('Прилет'), 'countryname'),



            Date::make(__('Дата обновления'), 'updated_at')
                ->format("H:i / d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Number::make('Сорт.', 'sorting')->sortable(),
            Number::make('Процент','procent')->buttons()->default(0),


        ];
    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {

        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([

                                Collapse::make('Заголовок', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Text::make('Вылет из...', 'subtitle'),
                                    Image::make(__('Изображение'), 'img')
                                                    ->showOnExport()
                                                    ->disk(config('moonshine.disk', 'moonshine'))
                                                    ->dir('category')
                                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable(),
                                ]),

                                Number::make('Процент','procent')->buttons()->default(0),

                                Collapse::make('Опции', [
                                    Select::make('Город вылета', 'city')
                                        ->options([
                                            'Казахстан' => config('tourvisor.city_kz'),
                                            'Россия' => config('tourvisor.city_rus')

                                        ]) ->searchable()->required(),


                                     Select::make('Страна', 'country')
                                         ->options(config('tourvisor.country'))->searchable()->required()
                                ]),



                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Публикация', [
                                    Switcher::make('Публикация', 'published')->default(1),
                                    Number::make('Сортировка','sorting')->buttons()->default(0),

                                ]),
                                Collapse::make('', [
                                Date::make(__('Дата обновления'), 'updated_at')
                                    ->format("H:i / d.m.Y")
                                    ->default(now()->toDateTimeString())
                                    ->sortable(),
                                ]),

                                Collapse::make('Ссылка', [
                                    Select::make('Страница перехода', 'travelitem_id')
                                        ->options($this->getShowPage()) ->searchable()->required(),


                                ]),

                                ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),


                    ]),


                    Tab::make(__('Дополнительно'), [

                    ]),
                ]),


            ]),
        ];


    }



    public function rules(Model $item): array
    {
        return [
               'travelitem_id' => 'min:2',
        ];
    }

    public function import(): ?ImportHandler
    {
        return null;
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }

}
