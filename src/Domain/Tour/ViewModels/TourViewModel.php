<?php

namespace Domain\Tour\ViewModels;

use App\Models\HotCategory;
use App\Models\Tour;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TourViewModel
{
    use Makeable;


    public function OneTour($slug)
    {
        $resorts = Cache::rememberForever('tour', function () {
            return Tour::query()
                ->get_tours()
                ->get();
        });
        $resort = $resorts->firstWhere('slug', $slug);
        return $resort;


    }

}
