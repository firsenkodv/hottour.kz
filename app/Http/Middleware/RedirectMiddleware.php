<?php

namespace App\Http\Middleware;

use App\Models\Seo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RedirectMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->getPathInfo();
        $array1 = ['/hottour','/poleznoe', '/tours'];


        if (in_array($url, $array1)) {
            return redirect(config('links.link.countries'));
        }

        $array2 = ['/o-nas'];
        if (in_array($url, $array2)) {
            return redirect(route('home'));
        }

        /**
         * Турция
         */

       /* $old = '/hottour/country/goriashchie-tury-v-turtciiu';
        $new = '/hottour/almaty/goriashchie-tury-v-turtciiu';
        if($url == $old) {
            return redirect($new);
        }*/
        // Астана -  норм.
        /**
         * Египет
         */


       /* $old = '/hottour/country/hot-egypt';
        $new = '/hottour/almaty/hot-egypt';
        if($url == $old) {
            return redirect($new);
        }*/
        // Астана -  норм.

        /**
         * ОАЭ
         */

       /* $old = '/hottour/country/goriashchie-tury-v-emiraty';
        $new = '/hottour/almaty/goriashchie-tury-v-emiraty';
        if($url == $old) {
            return redirect($new);
        }*/
        // Астана -  норм.

        /**
         * Греция
         */

      /*  $old = '/hottour/country/goriashchie-tury-v-gretciiu';
        $new = '/hottour/almaty/goriashchie-tury-v-gretciiu';
        if($url == $old) {
            return redirect($new);
        }*/
        // Астана -  норм.

        /**
         * Таиланд
         */
/*
        $old = '/hottour/country/goriashchie-tury-v-tailand';
        $new = '/hottour/almaty/goriashchie-tury-v-tailand';
        if($url == $old) {
            return redirect($new);
        }*/
        // Астана -  норм.


        /*        $old = '/hottour/astana/hottour-tourkei-from-astana';
                $new = '/hottour/almaty/goriashchie-tury-v-turtciiu';
                if($url == $old) {
                    return redirect($new);
                }*/




        return $next($request);
    }
}
