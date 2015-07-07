<?php

namespace App\Console\Commands;

use App\Exercise;
use Illuminate\Console\Command;
use DB;

class AddExercisesToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:exercises';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add exercises to the database';

    /**
     * Constants for setting muscle intensity on an exercise
     */
    private static $high_intensity = 100;
    private static $medium_intensity = 60;

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

        // Delete all data in the database, TODO: remove before production
        DB::statement("SET foreign_key_checks=0");
        Exercise::truncate();
        DB::statement("SET foreign_key_checks=1");

        $exercise = Exercise::create(['name' => 'Bench press']);
        $exercise->muscles()->attach(23,  ['muscle_intensity' => self::$high_intensity]);
        $exercise->muscles()->attach(22,  ['muscle_intensity' => self::$medium_intensity]);
        $exercise->muscles()->attach(5,  ['muscle_intensity' => self::$medium_intensity]);
        $exercise->muscles()->attach(45,  ['muscle_intensity' => self::$medium_intensity]);

        $exercise = Exercise::create(['name' => 'Deadlift']);
        $exercise->muscles()->attach(23,  ['muscle_intensity' => self::$high_intensity]);



    }
}
