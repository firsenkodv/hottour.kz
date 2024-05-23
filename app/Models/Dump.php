<?php

namespace App\Models;

use Domain\Dump\QueryBuilders\DumpQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dump extends Model
{
    // dumps
    public $table = "dumps";

    protected $fillable = [
        'title',
        'subtitle',
        'title_for_menu',
        'slug',
        'img',
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
        'sorting',
        'temp',
        'calc',
    ];
    protected $casts = [
        'params' => 'collection',
    ];

    public function parent():BelongsTo
    {
        return $this->belongsTo(self::class, 'dump_id');
    }

    public function publs():HasMany
    {
        return $this->hasMany(Publ::class);
    }






    /**
     * Создание метода вывода со своим DumpQueryBuilder
     */
    public function newEloquentBuilder($query):DumpQueryBuilder
    {
        return new DumpQueryBuilder($query);
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
