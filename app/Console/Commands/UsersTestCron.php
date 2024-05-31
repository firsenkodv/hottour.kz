<?php

namespace App\Console\Commands;

use App\Http\Controllers\Tourvisor\Service\Tourvisor;
use App\Mail\SendMails;
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

    /*    $a = new SendMails;
        if($a->sendTestSystemMessage()) {
            echo 'ok!!';
        }*/


    }



}
