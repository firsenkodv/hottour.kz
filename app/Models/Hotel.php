<?php

namespace App\Models;

use Domain\Hotel\QueryBuilders\HotelQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hotel extends Model
{


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
        'region',
        'index',
        'city',
        'published',
        'params',
        'metatitle',
        'description',
        'keywords',
        'sorting',
        'territory',
        'inroom',
        'roomtypes',
        'beach',
        'servicefree',
        'servicepay',
        'animation',
        'child',
        'meallist',
        'square'
];


    protected $casts = [
        'params' => 'collection',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(HotCategory::class, 'hot_category_id');
    }

    /**
     * Создание метода вывода со своим HotelQueryBuilder
     */
    public function newEloquentBuilder($query): HotelQueryBuilder
    {
        return new HotelQueryBuilder($query);
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
