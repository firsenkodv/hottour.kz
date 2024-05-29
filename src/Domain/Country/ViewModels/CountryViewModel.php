<?php

namespace Domain\Country\ViewModels;

use App\Models\HotCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class CountryViewModel
{
    use Makeable;

    public function listCountries()
    {

        $countries = Cache::rememberForever('list_countries', function () {

            return HotCategory::query()
                ->get_countries()
                ->paginate(20);
        });


        return $countries;

    }

    public function listCountriesForMain()
    {

        $countries = Cache::rememberForever('list_countries_for_main', function () {

            return HotCategory::query()
                ->get_countries_for_main()
                ->get();
        });


        return $countries;

    }

    public function OneCountry($slug)
    {
        $list_countries_all = Cache::rememberForever('list_countries_all', function () {

            return HotCategory::query()
                ->get_countries()
                ->get();
        });
        $one_country = $list_countries_all->firstWhere('slug', $slug);
        return $one_country;


    }

    public function HotCategoryRelation($slug)
    {

        $hot_categories_relation = Cache::rememberForever('hot_categories_relation', function () {

            return HotCategory::query()
                ->get_items()
                ->get();
        });


        $hot_category_relation = $hot_categories_relation->firstWhere('slug', $slug);
        return $hot_category_relation;


    }

    public function SubCountries($slug)
    {
        $id = ($this->OneCountry($slug))?$this->OneCountry($slug)->id:null;
        if (!is_null($id)) {
            return HotCategory::query()
                ->get_subcountry($id)
                ->get();

        }
        return false;
    }

}
