<?php

namespace App\Http\Controllers\Country;

use Domain\Country\ViewModels\CountryViewModel;
use Domain\Excursion\ViewModels\ExcursionViewModel;
use Domain\Hotel\ViewModels\HotelViewModel;
use Domain\Info\ViewModels\InfoViewModel;
use Domain\Resort\ViewModels\ResortViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CountryController extends Controller
{


    public function pages()
    {
        /**
         * Страница вывода всех стран
         **/

        $countries = CountryViewModel::make()->listCountries();

        return view('pages.countries.countries', [
            'countries' => $countries
        ]);

    }

    public function page($slug)
    {
        /**
         * Страница вывода страны
         **/

        $country = CountryViewModel::make()->OneCountry($slug);
        $subcountries = CountryViewModel::make()->SubCountries($slug);

        return view('pages.countries.country', [
            'country' => $country,
            'subcountries' => $subcountries,
        ]);

    }


    public function category($slug_country,$slug_subcountry)
    {



        /**
         * Страница вывода курортов определенной страны
         **/
        $country = CountryViewModel::make()->OneCountry($slug_country); // страна



        $hot_category = CountryViewModel::make()->HotCategoryRelation($slug_subcountry); // курорт страны (подлкатегория страны)



        $subcountries = CountryViewModel::make()->SubCountries($slug_country); // подкатегории страны

        //$resorts = $hot_category->resorts; // список курортов, отелей, экскурсий, полезного
        $resorts = (count($hot_category->resorts))?$hot_category->resorts()->paginate(20):[];

        //$excursions = $hot_category->excursions; // список курортов, отелей, экскурсий, полезного
        $excursions = (count($hot_category->excursions))?$hot_category->excursions()->paginate(20):[];

        //$hotels = $hot_category->hotels; // список курортов, отелей, экскурсий, полезного
        $hotels = (count($hot_category->hotels))?$hot_category->hotels()->orderBy('imagescount', 'DESC')->orderBy('stars', 'DESC')->orderBy('desc', 'DESC')->orderBy('rating', 'DESC')->paginate(20):[];

        //$infos = $hot_category->infos; // список курортов, отелей, экскурсий, полезного
        $infos = (count($hot_category->infos))?$hot_category->infos()->paginate(20):[];

        return view('pages.countries.category', [
            'hot_category' => $hot_category,
            'subcountries' => $subcountries,
            'country' => $country,
            'resorts' => $resorts,
            'excursions' => $excursions,
            'hotels' => $hotels,
            'infos' => $infos,
        ]);

    }

    public function item($slug_country,$slug_subcountry, $slug_subcountry__item)
    {
        /**
         * Страница вывода курорта, отеля, экскурсии, прочего  определенной страны
         **/
        $country = CountryViewModel::make()->OneCountry($slug_country); // страна
        $hot_category = CountryViewModel::make()->HotCategoryRelation($slug_subcountry);  // курорт страны (подлкатегория страны)
        $subcountries = CountryViewModel::make()->SubCountries($slug_country); // подкатегории страны

        //$resorts = $hot_category->resorts()->where('slug', $slug_subcountry__item)->where('published', 1)->first();
        $resorts = (count($hot_category->resorts))?$hot_category->resorts()->get():[];
        $excursions = (count($hot_category->excursions))?$hot_category->excursions()->get():[];
        $hotels = (count($hot_category->hotels))?$hot_category->hotels()->get():[];
        $infos = (count($hot_category->infos))?$hot_category->infos()->get():[];
        $view = 'pages.countries.item';

        if($resorts) {
            $item = ResortViewModel::make()->OneResort($slug_subcountry__item); // материал курорта
        }

        if($excursions) {
            $item = ExcursionViewModel::make()->OneExcursion($slug_subcountry__item); // материал экскурсии
        }

        if($hotels) {
            $item = HotelViewModel::make()->OneHotel($slug_subcountry__item); // материал отеля
            $view = 'pages.countries.hotel';
        }

        if($infos) {
            $item = InfoViewModel::make()->OneInfo($slug_subcountry__item); // материал полезного
        }
        return view($view, [
            'hot_category' => $hot_category,
            'item' => $item,
            'subcountries' => $subcountries,
            'country' => $country,
        ]);

    }



}
