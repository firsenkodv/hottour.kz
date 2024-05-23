<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;


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

        $data = $request->all();
        file_put_contents(base_path('config') . '/site/setting.php', "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");



        return back();
    }
}
