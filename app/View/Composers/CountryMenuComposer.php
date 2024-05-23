<?php

namespace App\View\Composers;

use App\Models\HotCategory;
use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CountryMenuComposer
{
    public function compose(View $view): void
    {

        $country_menu  = Cache::rememberForever('country_menu', function () {
            return HotCategory::query()
                ->where('published', true)
                ->where('hot_category_id', null)
                ->with(['child' => function($q) {
                    $q->orderBy('sorting');
                }])
                ->take(170)
                ->orderBy('sorting')
                ->get();
        });

        $view->with([
            'country_menu' => $country_menu
        ]);

    }
}
