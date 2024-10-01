<?php

namespace App\View\Composers;



use App\Models\ChangeLoadContact;
use App\Models\MoonshineSetting;
use App\Models\Survey;
use App\Models\UserSurvey;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ChangeContactComposer
{
    public function compose(View $view): void
    {
        $first = ChangeLoadContact::query()->first(); // основные
        $second = MoonshineSetting::query()->first(); // дорлнитнельные, если выключены основные

            $phone = ($first->phone)?:$second->phone1;
            $whatsapp = ($first->whatsapp)?:$second->whatsapp;
            $telegram = ($first->telegram)?:$second->telegram;


        $view->with([
            'phone' => $phone,
            'whatsapp' => $whatsapp,
            'telegram' => $telegram,
        ]);

    }

}
