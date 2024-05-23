<?php

namespace App\Models;

use Domain\Dump2\QueryBuilders\Dump2QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dump2 extends Model
{
    // dump2s
    public $table = "dump2s";

    protected $fillable = [
        'title',
        'subtitle',
        'title_for_menu',
        'slug',
        'img',
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
        'sorting',
        'temp',
        'calc',
    ];
    protected $casts = [
        'params' => 'collection',
    ];

    public function parent():BelongsTo
    {
        return $this->belongsTo(self::class, 'dump2_id');
    }


    public function companies():HasMany
    {
        return $this->hasMany(Company::class);
    }




    /**
     * Создание метода вывода со своим DumpQueryBuilder
     */
    public function newEloquentBuilder($query):Dump2QueryBuilder
    {
        return new Dump2QueryBuilder($query);
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
