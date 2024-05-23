<?php

namespace Domain\TourvisorCountry\ViewModels;

use App\Models\TourvisorCountry;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TourvisorCountryViewModel
{
    use Makeable;


    public function Countries()
    {
        $result = Cache::rememberForever('tourvisor_countries', function () {
            return TourvisorCountry::query()
                ->get_toutvisorcountries()
                ->get()->toArray();
        });
       return $result;


    }

}
