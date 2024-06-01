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

           $schedule->command('hottour:cron')->hourly(15); // горящие туры - каждый час + 15 минут
           $schedule->command('tourvisorhotel:cron')->dailyAt('01:00'); // отели один раз в сутки
           $schedule->command('sitemap-hotels:cron')->everySixHours($minutes = 0); // sitemap раз в 6 часов


        //  $schedule->command('userstest:cron')->everyMinute()->withoutOverlapping(10);
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
