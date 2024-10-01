<?php

namespace App\Http\Controllers\ChangeContacts;

use App\Http\Controllers\Controller;
use App\Models\ChangeLoadContact;
use App\Models\ChangeSaveContact;
use App\Models\ChangeStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChangeContactsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * получение данных их кнопок нажатия на контакты
     */

    public $type;


    public function canche_contacts(Request $request)
    {

        if (isset($request->type)) {
            $method_name = $request->type;
            $result = $this->$method_name($request->object);
            $error = '';

        } else {
            $error = 'No methodName!!!';
        }

        /**
         * запишем в статистику
         */

        $this->statistic($request->type, $request->object);


        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'object' => 'ok'
        ]);
    }


    public function statistic($key, $value)
    {

        ChangeStatistic::create([
            $key => $value
        ]);

    }


    public function phone($value)
    {

        $from = ChangeLoadContact::query()->first();
        $to = ChangeSaveContact::query()->first();

        if ($from->phone_mode == 1) {

            foreach ($to->phone as $k => $phone) {

                if ($phone['p'] == $value) {
                    $i  = count($to->phone);
                    if($k == $i) {
                        $next = 1;
                    } else {
                        $next = $k + 1;
                    }
                }

            }
            if ($next) {

                $from->phone = $to->phone[$next]['p'];
                $from->save();
               // Log::info($to->phone[$next]['p']); // в логи

            }

        }

        return $value;

    }

    public function whatsapp($value)
    {

        $from = ChangeLoadContact::query()->first();
        $to = ChangeSaveContact::query()->first();

        if ($from->whatsapp_mode == 1) {

            foreach ($to->whatsapp as $k => $whatsapp) {

                if ($whatsapp['p'] == $value) {
                    $i  = count($to->whatsapp);
                    if($k == $i) {
                        $next = 1;
                    } else {
                        $next = $k + 1;
                    }
                }

            }
            if ($next) {

                $from->whatsapp = $to->whatsapp[$next]['p'];
                $from->save();
                // Log::info($to->phone[$next]['p']); // в логи

            }

        }

        return $value;
    }

    public function telegram($value)
    {

        $from = ChangeLoadContact::query()->first();
        $to = ChangeSaveContact::query()->first();

        if ($from->telegram_mode == 1) {

            foreach ($to->telegram as $k => $telegram) {


                if ($telegram['p'] == $value) {
                    $i  = count($to->telegram);
                    if($k == $i) {
                        $next = 1;
                    } else {
                        $next = $k + 1;
                    }
                }

            }
            if ($next) {

                $from->telegram = $to->telegram[$next]['p'];
                $from->save();
                // Log::info($to->phone[$next]['p']); // в логи

            }

        }

        return $value;

    }


}
