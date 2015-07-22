<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\WorkoutPlan;
use DB;

class AddWorkoutPlanToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:workoutplans';

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
        WorkoutPlan::truncate();
        DB::statement("TRUNCATE TABLE `workout_workout_plan`");
        DB::statement("SET foreign_key_checks=1");

        // Variable for adding position on exercises in the workout
        $position = 0;

        // WorkoutPlan One
        $workoutPlan = WorkoutPlan::create(['name' => 'Test workoutPlan one']);
        $workouts = [];

        $workouts[] = ['Test workout one', $position++];
        $workouts[] = ['Test workout two', $position++];
        $workouts[] = ['Test workout three', $position++];
        $workouts[] = ['Test workout four', $position++];
        $workouts[] = ['Test workout five', $position++];

        $workoutPlan->addWorkouts($workouts);

        $position = 0;
        
        $workoutPlan = WorkoutPlan::create(['name' => 'TWO']);
        $workouts = [];

        $workouts[] = ['Test workout six', $position++];

        $workoutPlan->addWorkouts($workouts);
    }
}
