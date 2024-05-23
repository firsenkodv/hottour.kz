<?php

namespace App\Models;

use App\Http\Controllers\Tourvisor\Service\Tourvisor;
use Domain\Tour\QueryBuilders\TourQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{

    public $table = "tours";

    protected $fillable = [
        'title',
        'subtitle',
        'title_for_menu',
        'slug',
        'img',
        'imgflag',
        'tour_id',
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
        'removeitem',
        'city',
        'country'
    ];

    protected $casts = [
        'params' => 'collection',
    ];

    /**
     * Создание метода вывода со своим ExcursionQueryBuilder
     */
    public function newEloquentBuilder($query):TourQueryBuilder
    {
        return new TourQueryBuilder($query);
    }

    protected static function boot()
    {


        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {
            $city = $Moonshine->getOriginal('city');
            $country = $Moonshine->getOriginal('country');
            $remove = $Moonshine->getOriginal('removeitem');

/*            $Moonshine->cityname = getDepartureName($city);
              $Moonshine->countryname = getCountryName($country);*/

            $api = new Tourvisor();
            $result_api = ($api->getHotTours($city, $country))?:[];

            if(!empty($result_api)) {
                if((int)$result_api->hottours->hotcount > 0) {
                    // $tours =  $result_api->hottours->tour; // первый
                    // $last = end($result_api->hottours->tour); // последний
                    if($remove) {
                        $result = array_splice($result_api->hottours->tour, $remove);
                        $Moonshine->params = $result;

                    } else {
                        $Moonshine->params = $result_api->hottours->tour;
                    }
                } else {
                    $Moonshine->params = [];
                    $Moonshine->published = 0;
                }
            } else {
                $Moonshine->params = [];
                $Moonshine->published = 0;
            }

        });





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
