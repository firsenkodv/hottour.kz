<?php

namespace App\View\Composers;

use Domain\Dump\ViewModels\DumpViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PublMainComposer
{
    public function compose(View $view): void
    {

        $category = DumpViewModel::make()->OneDumpForId(1);
        // 1 = это новости // плохо, но ничего лучше не придумал

        $publs  = Cache::rememberForever('main_publs', function () use ($category){
            return (count($category->publs)) ? $category->publs()->orderBy('created_at', 'DESC')->take(4)->get() : [];
        });

        $view->with([
            'main_publs' => $publs,
            'main_category' => $category,
        ]);

    }
}
