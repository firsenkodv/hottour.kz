<?php

namespace App\View\Composers;

use App\Models\CustomerHotTour;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HotToursSwiperComposer
{
    public function compose(View $view): void
    {

        $swiper_hot_tours  = Cache::rememberForever('swiper_hot_tour', function () {
        return  CustomerHotTour::query()
            ->where('published', true)
            ->take(100)
            ->orderBy('sorting')
            ->get();

          });


        $view->with([
            'swiper_hot_tours' => $swiper_hot_tours,
        ]);

    }
}
