<?php

namespace Domain\Travelcategory\ViewModels;


use App\Models\Travelcategory;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TravelcategoryViewModel
{
    use Makeable;

    public function OneTravelcategory($slug)
    {
        $travel_category = Cache::rememberForever('travel_category', function () {
            return Travelcategory::query()
                ->get_travelcategory()
                ->get();
        });
        $category = $travel_category->firstWhere('slug', $slug);
        return $category;


    }

}
