<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomJsScript extends Model
{
   protected $table = 'custom_js_scripts';

   protected $fillable = [
       'title',
       'js',
       'published',
       'sorting',
   ];



    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });


    }


}
