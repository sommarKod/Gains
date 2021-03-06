<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exercise;
use App\ExerciseAlias;
use DB;

class AddExerciseAliasesToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:exercisealiases';

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
        ExerciseAlias::truncate();
        DB::statement("TRUNCATE TABLE `exercise_aliases`");
        DB::statement("SET foreign_key_checks=1");

        $exercise_id = Exercise::where('name', 'Bicep curl')->first()->id;
        ExerciseAlias::create(['name' => 'Curls', 'exercise_id' => $exercise_id]);

        $exercise_id = Exercise::where('name', 'Skull-crusher')->first()->id;
        ExerciseAlias::create(['name' => 'Triceps extension', 'exercise_id' => $exercise_id]);

        $exercise_id = Exercise::where('name', 'Overhead press')->first()->id;
        ExerciseAlias::create(['name' => 'Military press', 'exercise_id' => $exercise_id]);

    }
}
