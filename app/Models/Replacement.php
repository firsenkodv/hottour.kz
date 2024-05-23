<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
// replacements
    public $table = "replacements";

    protected $fillable = [
        'title',
        'params',
        'new_text',
        'old_text',
        'sorting'
    ];

    protected $casts = [
        'params' => 'collection',
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
