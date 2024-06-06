<?php

namespace App\View\Composers;

use App\Models\CustomerHotTour;
use App\Models\Hotel;
use App\Models\HotelMain;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HotelSwiperComposer
{
    public function compose(View $view): void
    {

      //  $hotel_swiper  = Cache::rememberForever('hotel_swiper', function () {
        $hotel_swiper =    HotelMain::query()
            ->take(30)
            ->get();

       //   });


        $view->with([
            'hotel_swiper' => $hotel_swiper,
        ]);

    }
}
