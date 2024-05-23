<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
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

class ContactResource extends TreeResource
{
    protected string $model = Contact::class;

    protected string $title = 'Контактная инфоормация';

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


            Text::make(__('Город'), 'title') ,

            Text::make('Приписка', 'label'),
            Text::make('Адрес', 'address'),


            Switcher::make('Публикация', 'published'),
            Switcher::make('Карта', 'yandex_map'),
            Number::make('Сорт.', 'sorting')->sortable()

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

                    Tab::make(__('Контакт'), [
                        Grid::make([
                            Column::make([
                                ID::make()
                                    ->sortable(),

                                Collapse::make('Город', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Text::make('Только он-лайн', 'label')
                                        ->hint('Приписка к Телефону'),


                                ]),


                            ])
                                ->columnSpan(6),

                            Column::make([

                                Collapse::make('Дополнительно', [

                                    Switcher::make('Публикация', 'published')->default(1),

                                  Number::make('Сортировка','sorting')->buttons()->default(0)

                                ]),


                            ])
                                ->columnSpan(6)

                        ]),

                        Grid::make([
                            Column::make([


                                Text::make('Адрес', 'address'),
                                Text::make('Карта', 'yandex_map'),
                                Text::make('Email', 'email'),
                                Text::make('Skype', 'skype'),
                                TinyMce::make('Описание', 'text')
                            ])
                                ->columnSpan(12)

                        ]),

                        Grid::make([
                            Column::make([

                                Json::make('Телефоны', 'data_phone')
                                    ->fields([
                                        Text::make('Номер', 'jt1'),
                                    ])
                                    ->vertical()
                                    ->removable(),
                            ])
                                ->columnSpan(6),
                            Column::make([
                                Json::make('Эл. почта', 'data_email')
                                    ->fields([
                                        Text::make('Email', 'jt1'),
                                    ])
                                    ->vertical()
                                    ->removable(),
                            ])
                                ->columnSpan(6),


                        ]),


                    ]),

                ]),
            ]),


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

    public function rules(Model $item): array
    {
        return [];
    }
}
