<?php

namespace App\Http\Controllers\Hottour;


use Domain\Travelcategory\ViewModels\TravelcategoryViewModel;
use Domain\Travelitem\ViewModels\TravelitemViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HottourController extends Controller
{



    public function category($slug_category)
    {



        /**
         * Страница вывода материалов определенной категории (горящие туры - из алмааты (список))
         **/
        $category = TravelcategoryViewModel::make()->OneTravelcategory($slug_category); // категория
        $items =  (count($category->travelitems))?$category->travelitems()->orderBy('sorting', 'DESC')->paginate(20):[];


        return view('pages.hottours.category', [
            'category' => $category,
            'items' => $items,
        ]);

    }

    public function item($slug_category, $slug_item)
    {
        /**
         * Страница вывода материала  определенной категории
         **/
        $category = TravelcategoryViewModel::make()->OneTravelcategory($slug_category); // категория
        $items =  (count($category->travelitems))?$category->travelitems()->orderBy('sorting', 'DESC')->paginate(20):[];
        $item = TravelitemViewModel::make()->OneTravelitem($slug_item); // материал


        return view('pages.hottours.item', [
            'category' => $category,
            'items' => $items,
            'item' => $item,
        ]);

    }



}
