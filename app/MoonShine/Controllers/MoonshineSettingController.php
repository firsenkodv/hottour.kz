<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;


use App\Models\MoonshineSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use MoonShine\Components\Layout\Flash;
use MoonShine\MoonShineRequest;
use MoonShine\Http\Controllers\MoonShineController;
use MoonShine\MoonShineUI;
use Symfony\Component\HttpFoundation\Response;

final class MoonshineSettingController extends MoonShineController
{
    public function __invoke(Request $request): Response
    {

        $n = explode("/", $_SERVER['HTTP_REFERER']);
        $key = array_pop($n);

        $result = MoonshineSetting::query()->updateOrCreate(
            ['key' => $key],
            [
                'key'=> $key,
                'bonus'=> (isset($request->bonus))? $request->bonus :null,
                'ball'=> (isset($request->ball))? $request->ball :null,
                'cashback'=> (isset($request->cashback))? $request->cashback :null,
                'fullAddress'=> (isset($request->fullAddress))? $request->fullAddress :null,
                'address'=> (isset($request->address))? $request->address :null,
                'country'=> (isset($request->country))? $request->country :null,
                'sityAddress'=> (isset($request->sityAddress))? $request->sityAddress :null,
                'idn'=> (isset($request->idn))? $request->idn :null,
                'phone1'=> (isset($request->phone1))? $request->phone1 :null,
                'phone2'=> (isset($request->phone2))? $request->phone2 :null,
                'whatsapp'=> (isset($request->whatsapp))? $request->whatsapp :null,
                'telegram'=> (isset($request->telegram))? $request->telegram :null,
                'facebook'=> (isset($request->facebook))? $request->facebook :null,
                'instagram'=> (isset($request->instagram))? $request->instagram :null,
                'youtube'=> (isset($request->youtube))? $request->youtube :null,

            ]);


        return back();
    }
}
