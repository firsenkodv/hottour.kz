<?php

namespace App\Models;

use Domain\Company\QueryBuilders\CompanyQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    // companies
    public $table = "companies";

    protected $fillable = [
        'title',
        'subtitle',
        'title_for_menu',
        'slug',
        'img',
        'publ_id',
        'dump2_id',
        'smalltext',
        'text',
        'text2',
        'pageimg1',
        'text3',
        'pageimg2',
        'text',
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
        return $this->belongsTo(Dump2::class, 'dump2_id');
    }

    /**
     * Создание метода вывода со своим CompanyQueryBuilder
     */
    public function newEloquentBuilder($query):CompanyQueryBuilder
    {
        return new CompanyQueryBuilder($query);
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
