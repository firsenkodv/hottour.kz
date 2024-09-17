<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\MoonshineSetting;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
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
    public function setting()
    {
        $n = explode("/", url2());
        $key = array_pop($n); // получаем последнюю часть url - это ключ
        $result = MoonshineSetting::query()->where('key', $key)->first();
        return (is_null($result))?null: $result->toArray();

    }


    public function components(): array
    {


        if(!is_null($this->setting())) {
            extract($this->setting());
        }


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


                    Tabs::make([

                        Tab::make(__('Общие настройки'), [

                    Grid::make([
                        Column::make([
                            Divider::make('Общие константы'),

                            Block::make([
                                Textarea::make('Бонусы', 'bonus')->default((isset($bonus)) ? $bonus : '') ,
                                Textarea::make('Баллы', 'ball')->default((isset($ball)) ? $ball : '' ) ,
                                Textarea::make('Кешбэк', 'cashback')->default((isset($cashback)) ? $cashback : '') ,

                            ]),

                        ])->columnSpan(6),
                        Column::make([

                            Divider::make('Контакты'),
                            Block::make([
                                Text::make('Полный адрес', 'fullAddress')->default((isset($fullAddress)) ? $fullAddress : '' ),
                                Text::make('Адрес', 'address')->default((isset($address)) ? $address : '' ),
                                Text::make('Страна', 'country')->default((isset($country)) ? $country : '' ),
                                Text::make('Адрес с городом', 'sityAddress')->default((isset($sityAddress)) ? $sityAddress : '' ),
                                Text::make('ИДН', 'idn')->default((isset($idn)) ? $idn : '' ),
                                Text::make('Телефон', 'phone1')->default((isset($phone1)) ? $phone1 : '' ),
                                Text::make('Телефон2', 'phone2')->default((isset($phone2)) ? $phone2 : '' ),
                            ]),
                            Divider::make('Сети'),
                                Block::make([
                                Text::make('WhatsApp', 'whatsapp')->default((isset($whatsapp)) ? $whatsapp : '' ),
                                Text::make('Telegram', 'telegram')->default((isset($telegram)) ? $telegram : '' ),
                                Text::make('Facebook', 'facebook')->default((isset($facebook)) ? $facebook : '' ),
                                Text::make('Instagram', 'instagram')->default((isset($instagram)) ? $instagram : '' ),
                                Text::make('Youtube', 'youtube')->default( (isset($youtube)) ? $youtube : '' ),
                                ]),



                        ])->columnSpan(6),
                    ])


                    ]),

                    ]),




                ]) ->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }



}
