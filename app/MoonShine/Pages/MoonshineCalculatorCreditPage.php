<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use Illuminate\Support\Facades\Cache;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Json;
use MoonShine\Fields\Position;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Pages\Page;

class MoonshineCalculatorCreditPage extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Кредитный калькулятор';
    }

    public function components(): array
    {
        Cache::flush();

        // $test = (config('site.calculator-credit.test'))?:'';
        $banks = (config('site.calculator-credit.banks')) ?: '';
        $countries = (config('site.calculator-credit.countries')) ?: '';


        return [


            FormBuilder::make('/moonshine/calculator-credit', 'POST')
                ->fields([


                    Tabs::make([

                        Tab::make(__('Общие настройки'), [

                            Grid::make([
                                Column::make([
                                    Divider::make('Общие константы'),
                                    Block::make([

                                        Json::make('Банки', 'banks')->fields([
                                            Position::make(),
                                            Text::make('Название', 'title'),
                                            Text::make('Процент', 'procent'),

                                            Json::make('Ставки', 'koff')->fields([

                                                Text::make('Месяц', 'month'),
                                                Text::make('Процент', 'procent'),
                                                Text::make('Месяц по русски', 'month_rus'),


                                            ])->creatable(limit: 15)
                                                ->removable(),


                                        ])->vertical()->creatable()
                                            ->removable()->default($banks),


                                    ])

                                ])->columnSpan(6),
                                Column::make([

                                    Divider::make('Страны'),
                                    Block::make([

                                        Json::make('Список', 'countries')->fields([
                                            Position::make(),
                                            Text::make('Название', 'title'),


                                        ])->creatable(limit: 15)
                                            ->removable()->default($countries),

                                    ]),


                                ])->columnSpan(6),
                            ])


                        ]),
                        Tab::make(__('Дополнительно'), [

                        ]),
                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }


}
