<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

use MoonShine\ActionButtons\ActionButton;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
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


class HotelResource extends ModelResource
{
    protected string $model = Hotel::class;

    protected string $title = 'Hotels';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Название', 'title')
                ->useOnImport()
                ->showOnExport(),
            Switcher::make('На главной', 'index'),
           Text::make('ID Отеля', 'slug')
               ->useOnImport()
               ->showOnExport(),
            BelongsTo::make('Страна', 'parent', resource: new HotCategoryResource())->nullable()
        ];
    }


    protected string $column = 'title';

    protected string $sortColumn = 'sorting';


    public function fields(): array
    {
        return [
            Block::make([


                Tabs::make([
                    Tab::make(__('Общие настройки'), [

                        Grid::make([
                            Column::make([
                                ID::make()->sortable()
                                    ->useOnImport()
                                    ->showOnExport(),

                                Image::make(__('Изображение'), 'img')
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('hotel')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hideOnIndex(),

                                Text::make(__('API'), 'slug')->hideOnForm(),

                                Text::make(__('Заголовок'), 'title')
                                    ->required()
                                    ->useOnImport()
                                    ->showOnExport(),

                                Slug::make(__('Алиас'), 'slug')
                                    ->from('title')
                                    ->hint('url адрес, обязательное поле')
                                    ->unique()
                                    ->useOnImport()
                                    ->showOnExport()
                                    ->hideOnIndex(),
                                Text::make(__('Подзаголовок'), 'subtitle')
                                    ->hideOnIndex(),
                                Text::make(__('hot_category_id'), 'hot_category_id')
                                    ->useOnImport()
                                    ->showOnExport()
                                ->hideOnIndex()
                                ->hideOnForm(),

                                Column::make([
                                    TinyMce::make('Краткое описание', 'smalltext')->hideOnIndex()
                                ]),


                                Switcher::make('Глав.', 'index')->hideOnForm(),
                                BelongsTo::make('Кат.', 'parent', resource: new HotCategoryResource())->hideOnForm(),
                                Text::make(__('country id'), 'country_id')->hideOnForm(),
                                Text::make(__('region id'), 'region_id')->hideOnForm(),
                                Switcher::make('Публ.', 'published')->updateOnPreview()->hideOnForm(),
                             /*   Switcher::make('Desc', 'description')->hideOnForm(),
                                Switcher::make('Key', 'keywords')->hideOnForm(),*/


                                Switcher::make('region', 'region')->hideOnForm(),
                                Switcher::make('stars', 'stars')->hideOnForm(),
                                Switcher::make('rating', 'rating')->hideOnForm(),
                                Switcher::make('placement', 'placement')->hideOnForm(),
                                Switcher::make('desc', 'desc')->hideOnForm(),
                                Switcher::make('image', 'imagescount')->hideOnForm(),
           /*                     Switcher::make('build', 'build')->hideOnForm(),
                                Switcher::make('repair', 'repair')->hideOnForm(),*/
                                Switcher::make('coord', 'coord')->hideOnForm(),
                            ])->columnSpan(6),

                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle')->hideOnIndex()
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Text::make('Мета тэг (description) ', 'description')->hideOnIndex()
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Text::make('Мета тэг (keywords) ', 'keywords')->hideOnIndex()
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Switcher::make('Публикация', 'published')->default(1)->hideOnIndex(),
                                    Switcher::make('На главной', 'index')->default(0)->hideOnIndex(),
                                        Select::make('Город вылета', 'city')
                                            ->options([
                                                'Казахстан' => config('tourvisor.city_kz'),
                                                'Россия' => config('tourvisor.city_rus')

                                            ]) ->searchable()->hideOnIndex(),





                                ]),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Категория', 'parent', resource: new HotCategoryResource())->nullable()->searchable()->hideOnIndex(),
                                    Text::make('country Id', 'country_id')->hideOnIndex()
                                        ->useOnImport()
                                        ->showOnExport()
                                        ->hint('обязательно для поиска'),
                                    Text::make('region Id', 'region_id')->hideOnIndex()
                                        ->useOnImport()
                                        ->showOnExport()
                                        ->hint('обязательно для поиска'),
                                ]),
                            ])->columnSpan(6),


                        ]),
                    ]),


                    Tab::make(__('Дополнительно'), [
                        Column::make([
                            TinyMce::make('Описание', 'text')->hideOnIndex()
                        ])
                            ->columnSpan(12),
                        Divider::make('Дополнительное изображение на страницу'),

                        Image::make(__('Изображение'), 'pageimg1')
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('hotel')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины')->hideOnIndex(),
                    ]),

                    Tab::make(__('Изображения'), [

                        Divider::make('Изображения по ссылке'),
                        Json::make('Фото от Tourvisor', 'params')
                            ->onlyValue()
                            ->creatable(
                                button: ActionButton::make('New', '#')->primary()
                            ) ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                    ]),
                    Tab::make(__('Данные отеля API'), [

                        Text::make(__('Регион'), 'region')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Звезды'), 'stars')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Рейтинг'), 'rating')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Размещение'), 'placement')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Орисание'), 'desc')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Количество фото'), 'imagescount')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Постройка'), 'build')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Ремонт'), 'repair')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                        Text::make(__('Координаты'), 'coord')
                            ->useOnImport()
                            ->showOnExport()
                            ->hideOnIndex(),

                    ]),
                ]),

            ]),
        ];
    }




    public function rules(Model $item): array
    {
        return [
                          'metatitle' => 'max:255',
                           'description' => 'max:255',
                           'keywords' => 'max:512',
        ];
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }

    public function import(): ?ImportHandler
    {
        return ImportHandler::make('Import');
    }

    public function export(): ?ExportHandler
    {
        return null;
        //return ExportHandler::make('Export');
    }

}
