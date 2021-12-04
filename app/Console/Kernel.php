<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\TwoDaysBeforeTrialPeriodExpire::class,
        Commands\OneDayBeforeTrialPeriodExpire::class,
        Commands\TrialExpire::class,
        Commands\TwoDaysAfterTrialExpire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        // hourlyAt(1) means it will call at 1minute past the hour
        $tasksLog = storage_path('/logs/tasks-output.log');
        $schedule->command('command:twodaybeforetrialexpire')->hourly()->appendOutputTo($tasksLog);
        // $schedule->command('command:onedaybeforetrialexpire')->everyFiveMinutes()->appendOutputTo($tasksLog);
        $schedule->command('command:onedaybeforetrialexpire')->hourly()->appendOutputTo($tasksLog);
        $schedule->command('command:trialexpire')->hourly()->appendOutputTo($tasksLog);
        $schedule->command('command:twodaysaftertrialexpire')->hourly()->appendOutputTo($tasksLog);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}