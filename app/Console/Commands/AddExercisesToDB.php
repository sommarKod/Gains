<?php

namespace App\Console\Commands;

use App\Exercise;
use Illuminate\Console\Command;
use App\Muscle;
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
    private static $max_intensity = 100;
    private static $high_intensity = 80;
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
        DB::enableQueryLog();
        // Delete all data in the database, TODO: remove before production
        DB::statement("SET foreign_key_checks=0");
        Exercise::truncate();
        DB::statement("TRUNCATE TABLE `exercise_muscle`");
        DB::statement("SET foreign_key_checks=1");

        // Bench press
        $exercise = Exercise::create(['name' => 'Bench press']);
        $muscles = [];
        $muscles[] = ['Pectoralis Major Sternal Head', self::$max_intensity];

        $muscles[] = ['Pectoralis Major Clavicular Head', self::$high_intensity];

        $muscles[] = ['Triceps Brachii', self::$medium_intensity];
        $muscles[] = ['Deltoid Anterior', self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Bicep curl
        $exercise = Exercise::create(['name' => 'Bicep curl']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', self::$max_intensity];

        $muscles[] = ['Brachialis', self::$medium_intensity];
        $muscles[] = ['Brachioradialis', self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Pull-up
        $exercise = Exercise::create(['name' => 'Pull-up']);
        $muscles = [];
        $muscles[] = ['Latissimus Dorsi', self::$max_intensity];

        $muscles[] = ['Brachialis', self::$medium_intensity];
        $muscles[] = ['Brachioradialis', self::$medium_intensity];
        $muscles[] = ['Biceps Brachii', self::$medium_intensity];
        $muscles[] = ['Teres Major', self::$medium_intensity];
        $muscles[] = ['Deltoid Posterior', self::$medium_intensity];
        $muscles[] = ['Infraspinatus', self::$medium_intensity];
        $muscles[] = ['Teres Minor', self::$medium_intensity];
        $muscles[] = ['Rhomboids', self::$medium_intensity];
        $muscles[] = ['Levator Scapulae', self::$medium_intensity];
        $muscles[] = ['Trapezius Lower Fibers Fibers', self::$medium_intensity];
        $muscles[] = ['Trapezius Middle Fibers Fibers', self::$medium_intensity];
        $muscles[] = ['Pectoralis Minor', self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Overhead press
        $exercise = Exercise::create(['name' => 'Overhead press']);
        $muscles = [];
        $muscles[] = ['Deltoid Anterior', self::$max_intensity];

        $muscles[] = ['Triceps Brachii', self::$medium_intensity];
        $muscles[] = ['Pectoralis Major Clavicular Head', self::$medium_intensity];
        $muscles[] = ['Trapezius Lower Fibers Fibers', self::$medium_intensity];
        $muscles[] = ['Trapezius Middle Fibers', self::$medium_intensity];
        $muscles[] = ['Deltoid Lateral', self::$medium_intensity];
        $muscles[] = ['Serratus Anterior', self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Skullcrusher
        $exercise = Exercise::create(['name' => 'Skull-crusher']);
        $muscles = [];
        $muscles[] = ['Triceps Brachii', self::$max_intensity];

        $exercise->attachToMuscle($muscles);

        // Lateral raise
        $exercise = Exercise::create(['name' => 'Lateral raise']);
        $muscles = [];
        $muscles[] = ['Deltoid Lateral', self::$max_intensity];

        $muscles[] = ['Deltoid Anterior', self::$medium_intensity];
        $muscles[] = ['Trapezius Lower Fibers', self::$medium_intensity];
        $muscles[] = ['Trapezius Middle Fibers', self::$medium_intensity];
        $muscles[] = ['Serratus Anterior', self::$medium_intensity];
        $muscles[] = ['Supraspinatus', self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Squats
        $exercise = Exercise::create(['name' => 'Squats']);
        $muscles = [];
        $muscles[] = ['Gluteus Maximus', self::$max_intensity];
        $muscles[] = ['Quadriceps', self::$high_intensity];

        $muscles[] = ['Adductors', self::$medium_intensity];
        $muscles[] = ['Soleus', self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Front Squats
        $exercise = Exercise::create(['name' => 'Front squats']);
        $muscles = [];
        $muscles[] = ['Quadriceps', self::$max_intensity];
        $muscles[] = ['Gluteus Maximus', self::$high_intensity];

        $muscles[] = ['Adductors', self::$medium_intensity];
        $muscles[] = ['Soleus', self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Standing calf raise
        $exercise = Exercise::create(['name' => 'Standing calf raise']);
        $muscles = [];
        $muscles[] = ['Gastrocnemius', self::$max_intensity];
        $muscles[] = ['Soleus', self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Dips
        $exercise = Exercise::create(['name' => 'Triceps Dips']);
        $muscles = [];
        $muscles[] = ['Triceps Brachii', self::$max_intensity];

        $muscles[] = ['Deltoid Anterior', self::$medium_intensity];
        $muscles[] = ['Pectoralis Major Clavicular Head', self::$medium_intensity];
        $muscles[] = ['Pectoralis Major Sternal Head', self::$medium_intensity];
        $muscles[] = ['Pectoralis Minor', self::$medium_intensity];
        $muscles[] = ['Rhomboids', self::$medium_intensity];
        $muscles[] = ['Levator Scapulae', self::$medium_intensity];
        $muscles[] = ['Latissimus Dorsi', self::$medium_intensity];

        $exercise->attachToMuscle($muscles);


    }
}
