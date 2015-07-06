<?php

namespace App\Console\Commands;

use App\Exercise;
use Illuminate\Console\Command;

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
        Exercise::firstOrCreate(
            ['name' => 'Bench press']
        );
        Exercise::firstOrCreate(
            ['name' => 'Deadlift']
        );
        Exercise::firstOrCreate(
            ['name' => 'Face pulls']
        );
        Exercise::firstOrCreate(
            ['name' => 'Shrugs']
        );
        Exercise::firstOrCreate(
            ['name' => 'Pull-ups']
        );
        Exercise::firstOrCreate(
            ['name' => 'Bicep curl']
        );
        Exercise::firstOrCreate(
            ['name' => 'Seated row']
        );
        Exercise::firstOrCreate(
            ['name' => 'Hammer curl']
        );
        Exercise::firstOrCreate(
            ['name' => 'Overhead press']
        );
        Exercise::firstOrCreate(
            ['name' => 'Incline dumbbell press']
        );
        Exercise::firstOrCreate(
            ['name' => 'Skullcrusher']
        );
        Exercise::firstOrCreate(
            ['name' => 'Lateral raise']
        );
        Exercise::firstOrCreate(
            ['name' => 'Dips']
        );
        Exercise::firstOrCreate(
            ['name' => 'Triceps pushdown']
        );
        Exercise::firstOrCreate(
            ['name' => 'Cable crossover']
        );
        Exercise::firstOrCreate(
            ['name' => 'Low-bar squats']
        );
        Exercise::firstOrCreate(
            ['name' => 'Front squats']
        );
        Exercise::firstOrCreate(
            ['name' => 'Standing calf-raises']
        );
        Exercise::firstOrCreate(
            ['name' => 'Seated calf-raises']
        );
        Exercise::firstOrCreate(
            ['name' => 'Seated hamstring curls']
        );
        Exercise::firstOrCreate(
            ['name' => 'Lying hamstring curls']
        );
        Exercise::firstOrCreate(
            ['name' => 'Leg-press']
        );
        Exercise::firstOrCreate(
            ['name' => 'Lounges']
        );
        Exercise::firstOrCreate(
            ['name' => 'Straight-leg deadlift']
        );
    }
}
