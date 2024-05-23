<?php

namespace App\Http\Controllers\Dump;

use Domain\Company\ViewModels\CompanyViewModel;
use Domain\Dump\ViewModels\DumpViewModel;
use App\Http\Controllers\Controller;
use Domain\Dump2\ViewModels\Dump2ViewModel;
use Domain\Publ\ViewModels\PublViewModel;


class DumpController extends Controller
{


    public function page($slug)
    {
        /**
         * Страница вывода одной категории полезного (dump)
         **/

        $category = DumpViewModel::make()->OneDump($slug);
        $publs = (count($category->publs))?$category->publs()->orderBy('created_at', 'DESC')->paginate(20):[];
        $top_category = config('links.link.dump');

        return view('pages.dumps.category', [
            'top_category' => $top_category,
            'category' => $category,
            'publs' => $publs
        ]);

    }

    public function item($slug_category, $slug_category__item) {
        /**
         * Страница вывода материла определенной публикации
         **/
        $category = DumpViewModel::make()->OneDump($slug_category);
        $item = PublViewModel::make()->OnePubl($slug_category__item);  // материал
        $top_category = config('links.link.dump');

        return view('pages.dumps.item', [
            'top_category' => $top_category,
            'item' => $item,
            'category' => $category,
        ]);

    }


    public function page2($slug)
    {
        /**
         * Страница вывода одной категории о нас  (dump2)
         **/

        $category = Dump2ViewModel::make()->OneDump2($slug);
        $publs = (count($category->companies))?$category->companies()->orderBy('created_at', 'DESC')->paginate(20):[];

        $top_category = config('links.link.dump2');


        return view('pages.dumps.category', [
            'top_category' => $top_category,
            'category' => $category,
            'publs' => $publs
        ]);

    }

    public function item2($slug_category, $slug_category__item) {
        /**
         * Страница вывода материла определенной публикации
         **/
        $category = Dump2ViewModel::make()->OneDump2($slug_category);
        $item = CompanyViewModel::make()->OneCompany($slug_category__item);  // материал
        $top_category = config('links.link.dump2');

        return view('pages.dumps.item', [
            'top_category' => $top_category,
            'item' => $item,
            'category' => $category,
        ]);

    }





}
