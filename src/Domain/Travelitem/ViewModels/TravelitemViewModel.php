<?php

namespace Domain\Travelitem\ViewModels;


use App\Models\Travelcategory;
use App\Models\Travelitem;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TravelitemViewModel
{
    use Makeable;

    public function OneTravelitem($slug)
    {
        $travel_item = Cache::rememberForever('travel_item', function () {
            return Travelitem::query()
                ->get_travelitem()
                ->get();
        });
        $item = $travel_item->firstWhere('slug', $slug);
        return $item;
    }

}
