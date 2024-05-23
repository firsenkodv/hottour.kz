<?php

namespace App\Console\Commands;

use App\Http\Controllers\Tourvisor\Service\Tourvisor;
use App\Models\CustomerHotTour;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
use File;
use Illuminate\Console\Command;
use Rap2hpoutre\FastExcel\FastExcel;
use Storage;

class UsersTestCron extends Command
{
    /**
     * Тестовый запуск php artisan schedule:run
     *
     * @var string
     */
    protected $signature = 'userstest:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start cron - userstest:cron';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    //    $users = File::get(storage_path('images/users/1.txt'));
        $users =  Storage::disk('public')->get('users/1.txt');
       // $exists = Storage::disk('public')->exists('users/1.txt');



        foreach (json_decode($users) as $us) {


              //   dump($us);
/*              $phone  = ltrim($us->phone, '+' );
              if($us->phone == '-') {
                   $phone = false;
                }
                if($us->phone == '') {
                   $phone = false;
                }*/
            $manager =  false;
            if((int)$us->manager == 595) {
                $manager =10;
            }
            if((int)$us->manager == 593) {
                $manager =9;
            }
            if((int)$us->manager == 1108) {
                $manager =10;
            }
            if((int)$us->manager == 794) {
                $manager =203;
            }
            if((int)$us->manager == 1286) {
                $manager =656;
            }
            if((int)$us->manager == 1350) {
                $manager =720;
            }

            User::updateOrCreate(['oldid' => $us->user_id],
                [
                    'oldid' => $us->user_id,
                 //   'name' => $us->username,
                  //  'email' => $us->email,
                  //  'phone' => ($phone)?:null,
                 //   'password' => (bcrypt($us->password))?:bcrypt(511111),
                 //   'avatar' => null,
                 //   'published' => true,
               //     'birthdate' => ($us->birthdate=="0000-00-00")?null:Carbon::parse($us->birthdate),
                //    'bonus' => ($us->bonus)?:null,
                 //   'ball' => ($us->ball)?:null,
                 //   'cashback' => ($us->cashback)?:null,
                    'user_id' => ($manager)?:((int)$us->manager)?:null,
                ]);
        }
    }



}
