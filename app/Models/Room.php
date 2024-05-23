<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
protected $table = "rooms";

    protected $fillable = [
        'title',
        'subtitle',
        'title_for_menu',
        'slug',
        'img',
        'imgflag',
        'gallery',
        'smalltext',
        'text',
        'text2',
        'pageimg1',
        'text3',
        'pageimg2',
        'text',

        'stars',
        'rating',
        'placement',
        'desc',
        'imagescount',
        'regioncode',
        'build',
        'repair',
        'coord',
        'hot_category_id',
        'country_id',
        'region_id',


        'published',
        'params',
        'metatitle',
        'description',
        'keywords',
        'sorting'
    ];


    protected $casts = [
        'params' => 'collection',
    ];
    public function parent():BelongsTo
    {
        return $this->belongsTo(HotCategory::class,  'hot_category_id');
    }

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
