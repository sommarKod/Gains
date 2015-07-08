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
        Artisan::call('databasefiller:muscles');
        Artisan::call('databasefiller:exercises');
        Artisan::call('databasefiller:musclealiases');
        Artisan::call('databasefiller:exercisealiases');
        Artisan::call('databasefiller:workouts');
        Artisan::call('databasefiller:workoutplans');
    }
}
