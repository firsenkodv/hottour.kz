<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\ChangeSaveContact;
use App\Models\ChangeStatistic;
use App\Models\MoonshineSetting;
use MoonShine\Components\FlexibleRender;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\File;
use MoonShine\Fields\Json;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Metrics\DonutChartMetric;
use MoonShine\Pages\Page;

class ChangeContactPage extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Настройки режимов показа средст связи';
    }

    public function setting()
    {
        $n = explode("/", url2());
        $key = array_pop($n); // получаем последнюю часть url - это ключ
        $result = ChangeSaveContact::query()->where('key', $key)->first();
        return (is_null($result)) ? null : $result->toArray();

    }
    public function statistic()
    {

        $items = ChangeStatistic::query()->select('phone', 'whatsapp', 'telegram')->get();
        settype($phone, "array");
        settype($whatsapp, "array");
        settype($telegram, "array");
        settype($array, "array");
        foreach ($items as $item) {
            if(!is_null($item->phone)) {
                $phone[] = $item->phone;
            }
            if(!is_null($item->whatsapp)) {
                $whatsapp[] = $item->whatsapp;
            }
            if(!is_null($item->telegram)) {
                $telegram[] = $item->telegram;
            }
        }

        if(count($phone)) {
         $array['Телефон'] = count($phone);
        }

        if(count($whatsapp)) {
            $array['WhatsApp'] = count($whatsapp);
        }

        if(count($telegram)) {
         $array['Telegram'] = count($telegram);
        }

        return $array;

    }


    public function components(): array
    {


        if (!is_null($this->setting())) {
            extract($this->setting());
        }

        return [


            FormBuilder::make('/moonshine/change-contacts', 'POST')
                ->fields([


                    Grid::make([
                        Column::make([

                            Divider::make('1'),
                            Block::make([

                                Select::make('Режим показа для телефона', 'phone_mode')
                                    ->options([
                                        1 => 'Режим 1',
                                        2 => 'Режим 2',
                                        3 => 'Режим 3',

                                    ])->default((isset($phone_mode)) ? $phone_mode : ''),

                                Json::make('Телефон', 'phone')->fields([
                                    Text::make('', 'p'),
                                ])->vertical()->creatable(limit: 30)->removable()->default((isset($phone)) ? $phone : ''),
                                Switcher::make('Публикация', 'phone_published')->default((isset($phone_published)) ? $phone_published : 1),

                            ]),


                        ])->columnSpan(4),
                        Column::make([

                            Divider::make('2'),
                            Block::make([

                                Select::make('Режим показа для whatsapp', 'whatsapp_mode')
                                    ->options([
                                        1 => 'Режим 1',
                                        2 => 'Режим 2',
                                        3 => 'Режим 3',

                                    ])->default((isset($whatsapp_mode)) ? $whatsapp_mode : ''),

                                Json::make('WhatsApp', 'whatsapp')->fields([
                                    Text::make('', 'p'),
                                ])->vertical()->creatable(limit: 30)->removable()->default((isset($whatsapp)) ? $whatsapp : ''),
                                Switcher::make('Публикация', 'whatsapp_published')->default((isset($whatsapp_published)) ? $whatsapp_published : 1),

                            ]),


                        ])->columnSpan(4),
                        Column::make([

                            Divider::make('3'),
                            Block::make([

                                Select::make('Режим показа для telegram', 'telegram_mode')
                                    ->options([
                                        1 => 'Режим 1',
                                        2 => 'Режим 2',
                                        3 => 'Режим 3',

                                    ])->default((isset($telegram_mode)) ? $telegram_mode : ''),

                                Json::make('Telegram', 'telegram')->fields([
                                    Text::make('', 'p'),
                                ])->vertical()->creatable(limit: 30)->removable()->default((isset($telegram)) ? $telegram : ''),
                                Switcher::make('Публикация', 'telegram_published')->default((isset($telegram_published)) ? $telegram_published : 1),

                            ]),


                        ])->columnSpan(4),

                    ]),
                    Divider::make('Статистика'),
                    //FlexibleRender::make('HTML'),
                    Grid::make([
                        Column::make([
                            DonutChartMetric::make('Статистика')
                                //->values(['CutCode' => 10000, 'Apple' => 9999, 'Хуй' => 190])
                               ->values($this->statistic())
                                ->colors(['#EF533F', '#00a356', '#27a3e3'])



                        ])->columnSpan(12),

                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }


}
