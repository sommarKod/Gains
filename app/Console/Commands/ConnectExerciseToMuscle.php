<?php

namespace App\Console\Commands;

use App\ExerciseToMuscle;
use Illuminate\Console\Command;

class ConnectExerciseToMuscle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databaseconnector:exercise_to_muscle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect muscles and exercises';

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
        ExerciseToMuscle::firstOrCreate(
            ['muscle_id' => '2',
            'exercise_id' => '6',
            'muscle_intensity' => '100']
        );
    }
}
