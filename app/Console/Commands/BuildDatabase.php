<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BuildDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate');
        echo "migrate Done!\n";
        Artisan::call('databasefiller:muscles');
        echo "databasefiller:muscles Done!\n";
        Artisan::call('databasefiller:exercises');
        echo "databasefiller:exercises Done!\n";
        Artisan::call('databasefiller:musclealiases');
        echo "databasefiller:musclealiases Done!\n";
      //  Artisan::call('databasefiller:exercisealiases');
        echo "databasefiller:exercisealiases Done!\n";
        Artisan::call('databasefiller:workouts');
        echo "databasefiller:workouts Done!\n";
        Artisan::call('databasefiller:workoutplans');
        echo "databasefiller:workoutplans Done!\n";
        Artisan::call('databasefiller:musclegroups');
        echo 'musclegroups Done!\n All done';

    }
}
