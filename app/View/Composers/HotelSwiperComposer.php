<?php

namespace App\View\Composers;

use App\Models\CustomerHotTour;
use App\Models\Hotel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HotelSwiperComposer
{
    public function compose(View $view): void
    {

        $hotel_swiper  = Cache::rememberForever('hotel_swiper', function () {
        return  Hotel::query()
            ->where('published', true)
            ->where('index', true)
            ->take(30)
            ->orderBy('sorting')
            ->get();

          });


        $view->with([
            'hotel_swiper' => $hotel_swiper,
        ]);

    }
}
