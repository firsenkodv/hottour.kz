<?php

namespace App\View\Composers;

use App\Models\HotCategory;
use App\Models\Menu;
use App\Models\Page;
use Domain\Country\ViewModels\CountryViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PageMainComposer
{
    public function compose(View $view): void
    {
        $main_page  = Cache::rememberForever('add_to_main', function ()  {

            return Page::query()->where('add_to_main', 1)->first();
        });

        $view->with([
            'main_page' => $main_page,
        ]);

    }
}
