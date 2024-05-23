<?php

namespace App\View\Composers;


use App\Models\Menudump;
use App\Models\Menuhottour;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TopmenutravelcategoriesComposer
{
    public function compose(View $view): void
    {

        $menu  = Cache::rememberForever('top_menuhottour', function () {
        return Menuhottour::query()
            ->where('published', true)
            ->with(['parent' => function ($q) {
                return $q->where('published', true);
            }])
            ->take(100)
            ->orderBy('sorting')
            ->get();

          });

        foreach ($menu as $m) {
            if (!is_null($m->parent)) {

                $tm[$m->id]['id'] = $m->id;
                $tm[$m->id]['tour_id'] = (isset($m->parent)) ? $m->parent->id : '';
                $tm[$m->id]['title'] = $m->title;
                $tm[$m->id]['slug'] = (isset($m->parent)) ? $m->parent->slug : '#';
            }
        }
        $top_menuhottour = array_slice($tm, 0, 100);


      //  dd($top_menu);

        $view->with([
            'top_menuhottour' => $top_menuhottour,
        ]);

    }
}
