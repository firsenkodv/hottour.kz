<?php

namespace App\View\Composers;

use App\Models\Menu;
use App\Models\MoonshineSetting;
use App\View\Composers\Traits\MemoryCache;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingComposer
{
    use MemoryCache;

    public $setting;

    /**
     * Create a  constants.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setting = $this->setting();
    }


    public function setting()
    {
        // get from cache or database
        $item = $this->cache(function () {
            $r =  MoonshineSetting::query()->first();
            if($r) {
                return $r->toArray();
            }
            return [];

        });
        return $item;
    }


    public function compose(View $view): void
    {

        $array = [];

        $array = $this->setting();


        $view->with([
            'setting' =>(count($array))?$array:[],
        ]);

    }
}
