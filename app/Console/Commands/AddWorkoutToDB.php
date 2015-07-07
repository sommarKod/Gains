<?php

namespace App\Console\Commands;

use App\Workout;
use Illuminate\Console\Command;
use DB;
use App\Exercise;

class AddWorkoutToDB extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:workouts';

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
        DB::enableQueryLog();
        // Delete all data in the database, TODO: remove before production
        DB::statement("SET foreign_key_checks=0");
        Workout::truncate();
        DB::statement("TRUNCATE TABLE `exercise_workout`");
        DB::statement("SET foreign_key_checks=1");

        // Variable for adding position on exercises in the workout
        $position = 0;

        // Workout one
        $workout = Workout::create(['name' => 'Test workout one']);
        $exercises = [];

        $exercises[] = ['Bicep curl', $position++];
        $exercises[] = ['Squats', $position++];
        $exercises[] = ['Bench press', $position++];

        $workout->attachToExercise($exercises);
        $position = 0;

        // Workout two
        $workout = Workout::create(['name' => 'Test workout two']);
        $exercises = [];

        $exercises[] = ['Front squats', $position++];
        $exercises[] = ['Squats', $position++];
        $exercises[] = ['Bench press', $position++];

        $workout->attachToExercise($exercises);
        $position = 0;

        // Workout three
        $workout = Workout::create(['name' => 'Test workout three']);
        $exercises = [];

        $exercises[] = ['Overhead press', $position++];
        $exercises[] = ['Squats', $position++];
        $exercises[] = ['Skull-crusher', $position++];

        $workout->attachToExercise($exercises);
        $position = 0;

        // Workout four
        $workout = Workout::create(['name' => 'Test workout four']);
        $exercises = [];

        $exercises[] = ['Bicep curl', $position++];
        $exercises[] = ['Lateral raise', $position++];
        $exercises[] = ['Overhead press', $position++];

        $workout->attachToExercise($exercises);
        $position = 0;

        // Workout five
        $workout = Workout::create(['name' => 'Test workout five']);
        $exercises = [];

        $exercises[] = ['Pull-up', $position++];
        $exercises[] = ['Front Squats', $position++];
        $exercises[] = ['Bench press', $position++];

        $workout->attachToExercise($exercises);
        $position = 0;

        // Workout six
        $workout = Workout::create(['name' => 'Test workout six']);
        $exercises = [];

        $exercises[] = ['Bicep curl', $position++];
        $exercises[] = ['Skull-crusher', $position++];
        $exercises[] = ['Lateral raise', $position++];

        $workout->attachToExercise($exercises);
        $position = 0;
    }
}
