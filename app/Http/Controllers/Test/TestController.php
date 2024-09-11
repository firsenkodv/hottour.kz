<?php

namespace App\Http\Controllers\Test;


use App\Http\Controllers\Controller;
use App\Models\User;
use File;
use Storage;


class TestController extends Controller
{


    public function test()
    {

        dd('app/Http/Controllers/Test/TestController.php');
        ini_set('max_execution_time', 180); //3 minutes
        $filename = asset(Storage::url('/images/1.txt'));
        $content = file_get_contents($filename);
        $array = json_decode($content);

        $newarray = [];
        foreach ($array as $item) {
            if ($item->email) {
                $newarray[$item->id]['name'] = $item->username;
                $newarray[$item->id]['email'] = $item->email;

                if ($item->phone) {
                    $newarray[$item->id]['phone'] = phone($item->username);
                }

                $flight[] = User::updateOrCreate(
                    ['email' => $newarray[$item->id]['email']],
                    [    'phone' => (isset($newarray[$item->id]['phone']))? $newarray[$item->id]['phone'] :null,
                         'name' => $newarray[$item->id]['name'],
                         'password' => bcrypt(time()),

                    ]
                );

            }
        }


        dd($flight);

    }


}
