<?php

namespace App\Console\Commands;

use App\Http\Controllers\Tourvisor\Service\Ajax;
use App\Http\Controllers\Tourvisor\Service\Tourvisor;
use App\Mail\SendMails;
use App\Models\CustomerHotTour;
use App\Models\Hotel;
use App\Models\HotelMain;
use App\Models\Tour;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class MainHotelsCron extends Command
{
    /**
     * Тестовый запуск php artisan schedule:run
     *
     * @var string
     */

    protected $signature = 'mainhotels:cron';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Start cron - mainhotels:cron';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $api = new Tourvisor();

        $hotels = Hotel::query()
            ->where('published', 1)
            ->where('index', 1)
            ->take(20)
            ->get();

        $price = '';
        if ($hotels->count() > 6) {

            HotelMain::truncate();

            foreach ($hotels as $hotel) {

                $result = $api->getHotel($hotel->slug);
                $params = ['region_id' => $hotel->region_id, 'id' => $hotel->slug, 'country_id' => $hotel->country_id];

                $api = new Tourvisor();
                $r = $api->getRequestid($params);
                $requestid = $r->result->requestid;
                $res = $api->getToursForHotel($requestid);

                dump($requestid);
                dd($res);


                for ($i = 0; $i < 2; $i++) {
                    $response2 = $this->loop($params);
                    if ($response2->data->status->toursfound != 0) {
                        break;
                    }

                }


                if (count($response2->data->result->hotel[0]->tours->tour)) {
                    $price = $response2->data->result->hotel[0]->tours->tour[0]->price;
                }


                HotelMain::query()->create([
                    'title' => $result->data->hotel->name,
                    'slug' => $hotel->slug,
                    'price' => ($price) ?: '',
                    'img' => $result->data->hotel->images->image[0],
                    'star' => $result->data->hotel->stars,
                    'country' => $result->data->hotel->country,
                    'meal' => ''
                ]);


            }


        }


    }

    public function loop($params)
    {


        $request = new Request([
            'departure' => 60,
            'region' => ($params['region_id']) ?: '',
            'country' => ($params['country_id']) ?: '',
            'hotels' => $params['id'],
            'daterange' => '04.06.2024 - 10.06.2024',
            'nightsfrom' => '6',
            'nightsto' => '12',
            'adults' => '2',
            'currency' => '3',
            'action' => 'searchTour',
        ]);

        $api = new Tourvisor();
        $ajax = new Ajax($request);

        $action = $ajax->input['action'];

        if ($action) {
            $response = $ajax->$action();
        }

         dump($response);

        $request2 = new Request([
            'departure' => 60,
            'region' => ($params['region_id']) ?: '',
            'country' => ($params['country_id']) ?: '',
            'hotels' => $params['id'],
            'daterange' => '04.06.2024 - 10.06.2024',
            'nightsfrom' => '6',
            'nightsto' => '12',
            'adults' => '2',
            'currency' => '3',
            'action' => 'searchTourResult',
            'requestid' => $response->result->requestid,

        ]);

        $ajax2 = new Ajax($request2);
        $action2 = $ajax2->input['action'];

        if ($action2) {
            $response2 = $ajax2->$action2();
        }

        dd($response2);
        return $response2;
    }
}
