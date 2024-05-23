<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menutour;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Menutour>
 */
class MenutourResource extends TreeResource
{
    protected string $model = Menutour::class;

    protected string $title = 'Menu Tours';

    protected string $column = 'title';

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

            Text::make(__('Заголовок'), 'title')
                ->required(),

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

                                Text::make('Заголовок', 'title')->required(),



                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Публикация', [

                                    Switcher::make('Публикация', 'published')->default(1),
                                ]),

                                Collapse::make('Вывод', [
                                    BelongsTo::make('Категория', 'parent', resource: new TourResource())->nullable()->searchable(),

                                    /*BelongsTo::make('Вложенность', 'menu', resource: new MenuResource())->nullable()->searchable(),*/
                                ]),


                            ])
                                ->columnSpan(6)

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
