<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TopmenuComposer
{
    public function compose(View $view): void
    {

        $menu  = Cache::rememberForever('top_menu', function () {
        return Menu::query()
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
                $tm[$m->id]['hot_category_id'] = (isset($m->parent)) ? $m->parent->id : '';
                $tm[$m->id]['title'] = $m->title;
                $tm[$m->id]['slug'] = (isset($m->parent)) ? $m->parent->slug : '#';
                $tm[$m->id]['imgflag'] = (isset($m->parent)) ? $m->parent->imgflag : '';
            }
        }
        $top_menu = array_slice($tm, 0, 10);
        $top_menu__left  = collect(array_slice($top_menu, 0, 5)); // от 0 до 10
        $top_menu__right  = collect(array_slice($top_menu, 5, 10)); // от 0 до 10

      //  dd($top_menu);

        $view->with([
            'top_menu' => $top_menu,
            'top_menu__left' => $top_menu__left,
            'top_menu__right' => $top_menu__right,
        ]);

    }
}
