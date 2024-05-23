<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
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
 * @extends ModelResource<Tour>
 */
class TourResource extends ModelResource
{
    protected string $model = Tour::class;

    protected string $title = 'Tours';

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


            Text::make(__('Заголовок'), 'title'),
            Text::make(__('Пропущено'), 'removeitem'),
            Slug::make(__('Алиас'), 'slug'),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),


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
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique()
                                ]),
                                Collapse::make('Опции', [
                                    Select::make('Город вылета', 'city')
                                        ->options([
                                            'Казахстан' => [
                                                60 => 'Алматы',
                                                59 => 'Астана',
                                                53 => 'Абакан',
                                                74 => 'Актау',
                                                73 => 'Актобе',
                                            ],
                                            'Россия' => [
                                                1 => 'Москва',
                                                5 => 'Санкт-Петербург',
                                                56 => 'Сочи',
                                                10 => 'Казань',
                                                3 => 'Екатеринбург',
                                                17 => 'Калининград',
                                                12 => 'Красноярск',
                                                9 => 'Новосибирск',
                                                21 => 'Омск',
                                                63 => 'Анапа',
                                                29 => 'Архангельск',
                                                40 => 'Астрахань',
                                                25 => 'Барнаул',
                                                32 => 'Белгород',
                                                36 => 'Благовещенск',
                                                45 => 'Братск',
                                                38 => 'Брянск',
                                                23 => 'Владивосток',
                                                46 => 'Владикавказ',
                                                27 => 'Волгоград',
                                                26 => 'Воронеж',
                                                116 => 'Геленджик',
                                                124 => 'Горно-Алтайск',
                                                96 => 'Грозный',
                                                103 => 'Иваново',
                                                64 => 'Ижевск',
                                                22 => 'Иркутск',
                                                95 => 'Калуга',
                                                15 => 'Кемерово',
                                                104 => 'Киров',
                                                11 => 'Краснодар',
                                                119 => 'Курган',
                                                47 => 'Курск',
                                                115 => 'Липецк',
                                                48 => 'Магнитогорск',
                                                94 => 'Махачкала',
                                                39 => 'Мин.Воды',
                                                30 => 'Мурманск',
                                                8 => 'Н.Новгород',
                                                54 => 'Нальчик',
                                                34 => 'Нижневартовск',
                                                19 => 'Нижнекамск',
                                                16 => 'Новокузнецк',
                                                67 => 'Новый Уренгой',
                                                123 => 'Ноябрьск',
                                                28 => 'Оренбург',
                                                49 => 'Орск',
                                                43 => 'П.Камчатский',
                                                65 => 'Пенза',
                                                2 => 'Пермь',
                                                117 => 'Петрозаводск',
                                                118 => 'Псков',
                                                18 => 'Ростов-на-Дону',
                                                7 => 'Самара',
                                                101 => 'Саранск',
                                                31 => 'Саратов',
                                                55 => 'Ставрополь',
                                                13 => 'Сургут',
                                                41 => 'Сыктывкар',
                                                52 => 'Томск',
                                                14 => 'Тюмень',
                                                42 => 'Улан-Удэ',
                                                50 => 'Ульяновск',
                                                84 => 'Уральск',
                                                4 => 'Уфа',
                                                20 => 'Хабаровск',
                                                35 => 'Ханты-Мансийск',
                                                51 => 'Чебоксары',
                                                6 => 'Челябинск',
                                                102 => 'Череповец',
                                                44 => 'Чита',
                                                24 => 'Ю.Сахалинск',
                                                37 => 'Якутск',
                                                85 => 'Ярославль',
                                            ]
                                        ]) ->searchable()->required(),
                                    Select::make('Страна', 'country')
                                        ->options([
                                            'Основные' => [
                                                1 => 'Египет',
                                                2 => 'Таиланд',
                                                4 => 'Турция',
                                                9 => 'ОАЭ',
                                                16 => 'Вьетнам',
                                                13 => 'Китай',
                                                47 => 'Россия',
                                            ],
                                            'Остальные' => [
                                                46 => 'Абхазия',
                                                31 => 'Австрия',
                                                55 => 'Азербайджан',
                                                71 => 'Албания',
                                                17 => 'Андорра',
                                                88 => 'Аргентина',
                                                53 => 'Армения',
                                                59 => 'Бахрейн',
                                                57 => 'Беларусь',
                                                74 => 'Бельгия',
                                                20 => 'Болгария',
                                                39 => 'Бразилия',
                                                44 => 'Великобритания',
                                                37 => 'Венгрия',
                                                90 => 'Венесуэла',
                                                6 => 'Греция',
                                                54 => 'Грузия',
                                                11 => 'Доминикана',
                                                30 => 'Израиль',
                                                3 => 'Индия',
                                                7 => 'Индонезия',
                                                29 => 'Иордания',
                                                92 => 'Иран',
                                                14 => 'Испания',
                                                24 => 'Италия',
                                                78 => 'Казахстан',
                                                40 => 'Камбоджа',
                                                79 => 'Катар',
                                                51 => 'Кения',
                                                15 => 'Кипр',
                                                60 => 'Киргизия',
                                                10 => 'Куба',
                                                80 => 'Ливан',
                                                27 => 'Маврикий',
                                                36 => 'Малайзия',
                                                8 => 'Мальдивы',
                                                50 => 'Мальта',
                                                23 => 'Марокко',
                                                18 => 'Мексика',
                                                81 => 'Мьянма',
                                                82 => 'Непал',
                                                45 => 'Нидерланды',
                                                83 => 'Норвегия',
                                                64 => 'Оман',
                                                87 => 'Панама',
                                                35 => 'Португалия',
                                                93 => 'Саудовская Аравия',
                                                28 => 'Сейшелы',
                                                58 => 'Сербия',
                                                25 => 'Сингапур',
                                                42 => 'Словакия',
                                                43 => 'Словения',
                                                41 => 'Танзания',
                                                5 => 'Тунис',
                                                56 => 'Узбекистан',
                                                26 => 'Филиппины',
                                                34 => 'Финляндия',
                                                32 => 'Франция',
                                                22 => 'Хорватия',
                                                21 => 'Черногория',
                                                19 => 'Чехия',
                                                52 => 'Швейцария',
                                                12 => 'Шри-Ланка',
                                                69 => 'Эстония',
                                                70 => 'Южная Корея',
                                                49 => 'Япония',

                                            ]
                                        ])->searchable()->required(),
                                    Select::make('Пропуск', 'removeitem')
                                        ->options(
                                            [   0 => 0,
                                                1 => 1,
                                                2 => 2,
                                                5 => 5,
                                                10 => 10,
                                                20 => 20,
                                                ]
                                        )->hint('Количество туров которые нужно пропустить' )

                                ]),

                                Text::make(__('Полный заголовок'), 'subtitle'),
                                Text::make(__('Название для внутреннего меню'), 'title_for_menu'),
                                Image::make(__('Изображение'), 'img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('tour')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable(),

                                Column::make([
                                    TinyMce::make('Краткое описание', 'smalltext')
                                ]),

                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),



                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),

                        Column::make([
                            TinyMce::make('Описание', 'text')
                        ])
                            ->columnSpan(12),
                        Divider::make('Дополнительное изображение на страницу'),

                        Image::make(__('Изображение'), 'pageimg1')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('tour')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),

                        Column::make([
                            TinyMce::make('Дополнительное описание', 'text2')
                        ])
                            ->columnSpan(12),

                        Image::make(__('Изображение'), 'pageimg2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('tour')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),

                        Column::make([
                            TinyMce::make('Дополнительное описание', 'text3')
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
            'metatitle' => 'max:255',
            'description' => 'max:512',
            'keywords' => 'max:512',
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
        return 'tour_id';
    }

    public function sortKey(): string
    {
        return 'sorting';
    }

}
