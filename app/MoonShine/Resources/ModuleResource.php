<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Relationships\BelongsTo;
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
 * @extends ModelResource<Module>
 */
class ModuleResource extends ModelResource
{
    protected string $model = Module::class;

    protected string $title = 'Modules';


    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),


            Text::make(__('Заголовок'), 'title')
                ->required(),

            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
            Switcher::make('Публикация', 'published')->updateOnPreview(),


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

                                ]),



                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),

                                Date::make(__('Дата создания'), 'created_at')
                                    ->format("d.m.Y")
                                    ->default(now()->toDateTimeString())
                                    ->sortable(),


                            ])
                                ->columnSpan(6)

                        ]),

                        Divider::make(),

                        Grid::make([
                            Column::make([

                                Json::make('Банк', 'data_room1')
                                    ->fields([
                                        Text::make('Банк', 'jt1'),
                                        Text::make('Процент', 'jt2')->fields([
                                            Text::make('Месяц', 'moomn')
                                        ]),
                                    ])
                                    ->vertical()
                                    ->removable(),
                            ])
                                ->columnSpan(6),
                            Column::make([
                                Json::make('Кредит', 'data_room2')
                                    ->fields([
                                        Text::make('Набор 2', 'jt1'),
                                    ])
                                    ->vertical()
                                    ->removable(),
                            ])
                                ->columnSpan(6),



                        ]),



                    ]),


                    Tab::make(__('Дополнительно'), [

                    ]),
                ]),


            ]),
        ];


    }



    public function rules(Model $item): array
    {
        return [];
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
