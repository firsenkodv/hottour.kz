<?php
namespace Domain\Hotel\ViewModels;

use App\Models\Hotel;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class HotelViewModel
{
    use Makeable;

    public function OneHotel($slug)
    {
       // $hotels = Cache::rememberForever('hotel', function () {
        $hotel =  Hotel::query()
                ->get_hotel($slug)
                ->first();
       // });
      //  $hotel = $hotels->firstWhere('slug', $slug);
        return $hotel;

    }

    public function Hotels($array)
    {
        $hotels =  Hotel::query()
                ->get_hotels($array)
                ->get()
                ->keyBy('slug')
                ->toArray();

        return $hotels;

    }



}
