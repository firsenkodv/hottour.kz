<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Model;
use App\Models\TourvisorCountry;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;


class TourvisorCountryResource extends TreeResource
{
    protected string $model = TourvisorCountry::class;

    protected string $title = 'TourvisorCountries';

    protected string $column = 'name';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Text::make(__('Страна'), 'name'),

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

                                Collapse::make('Название страны', [
                                    Text::make('Заголовок', 'name'),

                                ]),

                            ])
                                ->columnSpan(6),

                                Column::make([


                                    Collapse::make('Выбрать категорию', [
                                        BelongsTo::make('Категория', 'parent', resource: new HotCategoryResource())->nullable()->searchable(),

                                    ]),


                                Collapse::make('Данные для поиска', [

                                    Select::make('Страна', 'country_id')
                                        ->options(config('tourvisor.country'))->searchable()->required(),

                                    Text::make('Alpha2', 'flag'),


                                    Switcher::make('Популярные', 'popular')->default(true),
                                    Switcher::make('Публикация', 'active')->default(true),
                                    Switcher::make('По умолчанию', 'default'),

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
            'country_id' => 'required',
        ];
    }

    protected function pages(): array
    {
        return [
            CategoryTreePage::make($this->title()),
            FormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DetailPage::make(__('moonshine::ui.show')),
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


    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
