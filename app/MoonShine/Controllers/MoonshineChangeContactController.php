<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use App\Models\ChangeLoadContact;
use App\Models\ChangeSaveContact;
use MoonShine\MoonShineRequest;
use MoonShine\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

final class MoonshineChangeContactController extends MoonShineController
{
    public function __invoke(MoonShineRequest $request): Response
    {
        // Examples

        // $this->toast('Hello world');
        // $request->getPage();
        // $request->getResource();

        /*
        // Render custom content
        return $this
            ->view('path_to_blade', ['param' => 'value'])
            ->setLayout('custom_layout')
            ->render();
        */

        $n = explode("/", $_SERVER['HTTP_REFERER']);
        $key = array_pop($n);

        ChangeSaveContact::query()->updateOrCreate(
            ['key' => $key],
            [
                'key'=> $key,
                'phone'=> (isset($request->phone))? $request->phone :null,
                'whatsapp'=> (isset($request->whatsapp))? $request->whatsapp :null,
                'telegram'=> (isset($request->telegram))? $request->telegram :null,

                'phone_mode'=> (isset($request->phone_mode))? $request->phone_mode :null,
                'whatsapp_mode'=> (isset($request->whatsapp_mode))? $request->whatsapp_mode :null,
                'telegram_mode'=> (isset($request->telegram_mode))? $request->telegram_mode :null,

                'phone_published'=> (isset($request->phone_published))? $request->phone_published :1,
                'whatsapp_published'=> (isset($request->whatsapp_published))? $request->whatsapp_published :1,
                'telegram_published'=> (isset($request->telegram_published))? $request->telegram_published :1,

            ]);

        $phone = '';
        $whatsapp = '';
        $telegram = '';
        $phone =  ($request->phone_published) ?current($request->phone)['p'] : '';
        $whatsapp = ($request->whatsapp_published) ? current($request->whatsapp)['p'] : '';
        $telegram = ($request->telegram_published) ? current($request->telegram)['p'] : '';

        ChangeLoadContact::query()->updateOrCreate(
            ['key' => $key],
            [
                'key'=> $key,
                'phone'=> ($phone)?  :null,
                'whatsapp'=> ($whatsapp)?  :null,
                'telegram'=> ($telegram)? :null,

                'phone_mode'=> (isset($request->phone_mode))? $request->phone_mode :null,
                'whatsapp_mode'=> (isset($request->whatsapp_mode))? $request->whatsapp_mode :null,
                'telegram_mode'=> (isset($request->telegram_mode))? $request->telegram_mode :null,


            ]);
        return back();
    }
}
