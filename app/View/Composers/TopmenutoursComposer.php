<?php

namespace App\View\Composers;

use App\Models\HotCategory;
use App\Models\Menu;
use App\Models\Menutour;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TopmenutoursComposer
{
    public function compose(View $view): void
    {

        $menu  = Cache::rememberForever('top_menutours', function () {
        return Menutour::query()
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
        $top_menutours = array_slice($tm, 0, 20);


      //  dd($top_menu);

        $view->with([
            'top_menutours' => $top_menutours,
        ]);

    }
}
