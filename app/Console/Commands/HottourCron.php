<?php

namespace App\Console\Commands;

use App\Http\Controllers\Tourvisor\Service\Tourvisor;
use App\Mail\SendMails;
use App\Models\CustomerHotTour;
use App\Models\Tour;
use Illuminate\Console\Command;

class HottourCron extends Command
{
    /**
     * Тестовый запуск php artisan schedule:run
     *
     * @var string
     */

    protected $signature = 'hottour:cron';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Start cron - hottour:cron';

    /**
     * Execute the console command.
     */

    public function handle()
    {

        $CustomerHotTour = CustomerHotTour::query()
            ->where('published', true)->get();
        $tour = Tour::query()
            ->where('published', true)->get();
        $api = new Tourvisor();

        foreach ($CustomerHotTour as $item) {
            $city = $item->city;
            $country = $item->country;
            $result_api = ($api->getHotTours($city, $country)) ?: [];

            if (!empty($result_api)) {
                if ((int)$result_api->hottours->hotcount > 0) {
                    // $tours =  $result_api->hottours->tour;
                    $first = current($result_api->hottours->tour);
                    // $last = end($result_api->hottours->tour);

                    $item->params = $first;
                    $price = round($first->price);
                    $priceold = round($first->priceold);

                    $pr = number_format(($priceold - $price) * 100 / $price);
                    if ($pr == abs($pr)) {
                        $item->procent = $pr; // Число положительное
                    }

                    if ($pr != abs($pr)) {
                        $item->procent = 0; // Число отрицательное
                    }
                    $item->save();
                    \Log::info("Cron в таблице customer_hot_tours сработал");

                } else {
                    $item->params = [];
                    $item->procent = 0;
                    $item->published = 0;
                    $item->save();
                    \Log::info("Tourvisor для customer_hot_tours выдал  0!");
                }


            } else {
                $item->params = [];
                $item->procent = 0;
                $item->published = 0;
                $item->save();
                \Log::info("Cron в таблице customer_hot_tours выдал ошибку!");

            }

        }


        foreach ($tour as $item) {
            $city = $item->city;
            $country = $item->country;
            $remove = $item->removeitem;

            $result_api = ($api->getHotTours($city, $country)) ?: [];

            if (!empty($result_api)) {
                if ((int)$result_api->hottours->hotcount > 0) {
                    // $tours =  $result_api->hottours->tour; // первый
                    // $last = end($result_api->hottours->tour); // последний
                    if ($remove) {
                        $result = array_splice($result_api->hottours->tour, $remove);
                        $item->params = $result;

                    } else {
                        $item->params = $result_api->hottours->tour;
                    }
                    $item->save();
                    \Log::info("Cron в таблице tours сработал");

                } else {
                    $item->params = [];
                    $item->published = 0;
                    $item->save();
                    \Log::info("Tourvisor для tours выдал  0!");
                }
            } else {
                $item->params = [];
                $item->published = 0;
                $item->save();
                \Log::info("Cron в таблице tours выдал ошибку!");
            }

        }


            $a = new SendMails;
            $a->sendTestSystemMessage('app/Console/Commands/HottourCron.php');

    }
}
