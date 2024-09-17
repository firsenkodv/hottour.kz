<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\MoonshineCalculator;
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

    public function setting()
    {
        $n = explode("/", url2());
        $key = array_pop($n); // получаем последнюю часть url - это ключ
        $result = MoonshineCalculator::query()->where('key', $key)->first();
        return (is_null($result))?null: $result->toArray();

    }
    public function components(): array
    {
        Cache::flush();

        if(!is_null($this->setting())) {
            extract($this->setting());
        }


        $banks = (config('site.calculator-credit.banks')) ?: '';
        $countries = (config('site.calculator-credit.countries')) ?: '';


        return [


            FormBuilder::make('/moonshine/calculator-credit', 'POST')
                ->fields([


                    Tabs::make([

                        Tab::make(__('Общие настройки'), [

                            Grid::make([
                                Column::make([
                                    Divider::make('Банки'),
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
                                            ->removable()->default((isset($banks)) ? $banks : ''),


                                    ])

                                ])->columnSpan(6),
                                Column::make([

                                    Divider::make('Страны'),
                                    Block::make([

                                        Json::make('Страны', 'countries')->fields([
                                            Position::make(),
                                            Text::make('Название', 'title'),


                                        ])->creatable(limit: 15)
                                            ->removable()->default((isset($countries)) ? $countries : ''),

                                    ]),


                                ])->columnSpan(6),
                            ])


                        ]),

                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }


}
