<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Pages\Page;

class MoonshineSettingPage extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Настройки сайта';
    }

    public function components(): array
    {

        $bonus = (config('site.setting.bonus'))?:'';
        $ball = (config('site.setting.ball'))?:'';
        $cashback = (config('site.setting.cashback'))?:'';

        $fullAddress = (config('site.setting.fullAddress'))?:'';
        $address = (config('site.setting.address'))?:'';
        $country = (config('site.setting.country'))?:'';
        $sityAddress = (config('site.setting.sityAddress'))?:'';
        $idn = (config('site.setting.idn'))?:'';
        $phone1 = (config('site.setting.phone1'))?:'';
        $phone2 = (config('site.setting.phone2'))?:'';
        $whatsapp = (config('site.setting.whatsapp'))?:'';
        $telegram = (config('site.setting.telegram'))?:'';
        $email = (config('site.setting.email'))?:'';
        $facebook = (config('site.setting.facebook'))?:'';
        $instagram = (config('site.setting.instagram'))?:'';
        $youtube = (config('site.setting.youtube'))?:'';


        return [


            FormBuilder::make('/moonshine/setting-website', 'POST')
                ->fields([
                    Grid::make([
                        Column::make([
                            Divider::make('Общие константы'),

                            Block::make([
                                Textarea::make('Бонусы', 'bonus')->default($bonus) ,
                                Textarea::make('Баллы', 'ball')->default($ball) ,
                                Textarea::make('Кешбэк', 'cashback')->default($cashback) ,

                            ]),

                        ])->columnSpan(6),
                        Column::make([

                            Divider::make('Контакты'),
                            Block::make([
                                Text::make('Полный адрес', 'fullAddress')->default($fullAddress),
                                Text::make('Адрес', 'address')->default($address),
                                Text::make('Страна', 'country')->default($country),
                                Text::make('Адрес с городом', 'sityAddress')->default($sityAddress),
                                Text::make('ИДН', 'idn')->default($idn),
                                Text::make('Телефон', 'phone1')->default($phone1),
                                Text::make('Телефон2', 'phone2')->default($phone2),
                            ]),
                            Divider::make('Сети'),
                                Block::make([
                                Text::make('WhatsApp', 'whatsapp')->default($whatsapp),
                                Text::make('Telegram', 'telegram')->default($telegram),
                                Text::make('Facebook', 'facebook')->default($facebook),
                                Text::make('Instagram', 'instagram')->default($instagram),
                                Text::make('Youtube', 'youtube')->default($youtube),
                                ]),



                        ])->columnSpan(6),
                    ])
                ]) ->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }



}
