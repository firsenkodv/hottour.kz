<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [

        Commands\HottourCron::class,

    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //->everyMinute();

 /*        $schedule->command('hottour:cron')->dailyAt('01:00');
           $schedule->command('tourvisorhotel:cron')->everyMinute();*/
        $schedule->command('userstest:cron')->everyMinute()->withoutOverlapping(10);
      //   $schedule->command('sitemap-hotels:cron')->everyMinute();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
