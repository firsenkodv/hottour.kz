<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;


use App\Models\MoonshineCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use MoonShine\Components\Layout\Flash;
use MoonShine\MoonShineRequest;
use MoonShine\Http\Controllers\MoonShineController;
use MoonShine\MoonShineUI;
use Symfony\Component\HttpFoundation\Response;

final class MoonshineCalculatorCreditController extends MoonShineController
{
    public function __invoke(Request $request): Response
    {

        $n = explode("/", $_SERVER['HTTP_REFERER']);
        $key = array_pop($n);

        $result = MoonshineCalculator::query()->updateOrCreate(
            ['key' => $key],
            [
                'key'=> $key,
                'banks'=> (isset($request->banks))? $request->banks :null,
                'countries'=> (isset($request->countries))? $request->countries :null,
            ]);


        return back();
    }
}
