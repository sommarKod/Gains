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
        '\App\Console\Commands\AddMusclesToDB',
        '\App\Console\Commands\AddExercisesToDB',
        '\App\Console\Commands\AddExerciseAliasesToDB',
        '\App\Console\Commands\AddMuscleAliasesToDB',
        '\App\Console\Commands\BuildDatabase'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    }
}
