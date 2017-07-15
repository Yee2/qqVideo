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
        'App\Console\Commands\Se',
        'App\Console\Commands\Socket',
        'App\Console\Commands\One',
        'App\Console\Commands\XiciIP',
        'App\Console\Commands\Video',
        'App\Console\Commands\Youjizz',
        'App\Console\Commands\Yiqiyin',
        'App\Console\Commands\UUU',
        'App\Console\Commands\Qqvideo',
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
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
