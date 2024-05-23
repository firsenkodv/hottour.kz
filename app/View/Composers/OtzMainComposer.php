<?php

namespace App\View\Composers;

use Domain\Dump\ViewModels\DumpViewModel;
use Domain\Dump2\ViewModels\Dump2ViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class OtzMainComposer
{
    public function compose(View $view): void
    {

        $category = Dump2ViewModel::make()->OneDump2ForId(1);
        // 1 = это отзывы // плохо, но ничего лучше не придумал

        $otz  = Cache::rememberForever('main_otz', function () use ($category){
            return (count($category->companies)) ? $category->companies()->orderBy('created_at', 'DESC')->take(40)->get() : [];
        });

        $view->with([
            'main_otz' => $otz,
            'main_category' => $category,
        ]);

    }
}
