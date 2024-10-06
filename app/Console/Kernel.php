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

          $schedule->command('sitemap-hotels:cron')->dailyAt('01:00');
          $schedule->command('hottour:cron')->dailyAt('04:00');
          $schedule->command('mainhotels:cron')->dailyAt('05:00');
          // $schedule->command('tourvisorhotel:cron')->weeklyOn(1, '19:00');
          $schedule->command('change-contacts:cron')->dailyAt('00:00');

          $schedule->command('backup:clean')->daily()->at('01:10');
          $schedule->command('backup:run')->daily()->at('01:30');

         //  $schedule->command('userstest:cron')->everyMinute();

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
