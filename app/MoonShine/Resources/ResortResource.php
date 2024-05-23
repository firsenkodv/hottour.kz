<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;

use Leeto\MoonShineTree\Resources\TreeResource;
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
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Resources\ModelResource;

class ResortResource extends ModelResource
{
    protected string $model = Resort::class;

    protected string $title = 'Resorts';

    protected string $column = 'sorting';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable()
                ->useOnImport()
                ->showOnExport(),

            Image::make(__('Изображение'), 'img')
                ->showOnExport()
                ->disk(config('moonshine.disk', 'moonshine'))
                ->dir('category')
                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg']),

            Text::make(__('Заголовок'), 'title')
                ->required()
                ->useOnImport()
                ->showOnExport(),
            Slug::make(__('Алиас'), 'slug')
                ->from('title')
                ->hint('url адрес, обязательное поле')
                ->unique()
                ->useOnImport()
                ->showOnExport(),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Desc', 'description')
                ->useOnImport()
                ->showOnExport(),
            Switcher::make('Key', 'keywords')
                ->useOnImport()
                ->showOnExport(),
            Number::make('Сорт.', 'sorting')->sortable(),
            Text::make(__('hot_category_id'), 'hot_category_id')
                ->useOnImport()
                ->showOnExport()
                ->hideOnIndex()
                ->hideOnForm(),


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


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required()
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique()
                                        ->useOnImport()
                                        ->showOnExport()
                                ]),


                                Text::make(__('Подзаголовок'), 'subtitle')
                                    ->useOnImport()
                                    ->showOnExport(),
                                Image::make(__('Изображение'), 'img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('category')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->useOnImport()
                                    ->showOnExport(),

                                Column::make([
                                    TinyMce::make('Краткое описание', 'smalltext')
                                        ->useOnImport()
                                        ->showOnExport()
                                ])


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle')
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Text::make('Мета тэг (description) ', 'description')
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Text::make('Мета тэг (keywords) ', 'keywords')
                                        ->useOnImport()
                                        ->showOnExport(),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Категория', 'parent', resource: new HotCategoryResource())->nullable()->searchable(),
                                    Number::make('Сортировка','sorting')->buttons()->default(0)

                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),

                        Column::make([
                            TinyMce::make('Описание', 'text')
                                ->useOnImport()
                                ->showOnExport()
                        ])
                            ->columnSpan(12),
                        Divider::make('Дополнительное изображение на страницу'),

                        Image::make(__('Изображение'), 'pageimg1')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('category')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),

                        Column::make([
                            TinyMce::make('Дополнительное описание', 'text2')
                                ->useOnImport()
                                ->showOnExport()
                        ])
                            ->columnSpan(12),

                        Image::make(__('Изображение'), 'pageimg2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('category')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),

                        Column::make([
                            TinyMce::make('Дополнительное описание', 'text3')
                                ->useOnImport()
                                ->showOnExport()
                        ])
                            ->columnSpan(12),
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
            'metatitle' => 'max:1024',
            'description' => 'max:1024',
            'keywords' => 'max:1024',
        ];
    }


    public function import(): ?ImportHandler
    {
        return ImportHandler::make('Import');
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }


    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
