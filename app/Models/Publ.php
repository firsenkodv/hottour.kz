<?php

namespace App\Models;

use Domain\Publ\QueryBuilders\PublQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Support\Module\Module;

class Publ extends Model
{
    // dumps
    public $table = "publs";

    protected $fillable = [
        'title',
        'subtitle',
        'title_for_menu',
        'slug',
        'img',
        'publ_id',
        'dump_id',
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
        return $this->belongsTo(Dump::class, 'dump_id');
    }

    /**
     * Создание метода вывода со своим PublQueryBuilder
     */
    public function newEloquentBuilder($query):PublQueryBuilder
    {
        return new PublQueryBuilder($query);
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
