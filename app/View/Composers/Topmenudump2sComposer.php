<?php

namespace App\View\Composers;

use App\Models\Menudump2;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class Topmenudump2sComposer
{
    public function compose(View $view): void
    {

        $menu  = Cache::rememberForever('top_menudump2s', function () {
        $menu_dump2 =  Menudump2::query()
            ->where('published', true)
            ->with(['parent' => function ($q) {
                return $q->where('published', true);
            }])
            ->take(100)
            ->orderBy('sorting')
            ->get();

            foreach ($menu_dump2 as $m) {
                if (!is_null($m->parent)) {

                    $tm[$m->id]['id'] = $m->id;
                    $tm[$m->id]['tour_id'] = (isset($m->parent)) ? $m->parent->id : '';
                    $tm[$m->id]['title'] = $m->title;
                    $tm[$m->id]['slug'] = (isset($m->parent)) ? $m->parent->slug : '#';
                }
            }

            return $tm;

          });
//dd($menu);

        $top_menudump2s = array_slice($menu, 0, 100);


      //  dd($top_menu);

        $view->with([
            'top_menudump2s' => $top_menudump2s,
        ]);

    }
}
