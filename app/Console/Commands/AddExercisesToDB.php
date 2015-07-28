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
    private static $low_intensity = 40;

    private static $traps_U = 'Trapezius Upper Fibers';
    private static $traps_M = 'Trapezius Middle Fibers';
    private static $traps_L = 'Trapezius Lower Fibers';
    private static $triceps = 'Triceps Brachii';
    private static $biceps = 'Biceps Brachii';
    private static $sternal = 'Pec. M. Sternal Head';
    private static $clavicular = 'Pec. M. Clavicular Head';
    private static $delt_ant = 'Deltoid Anterior';
    private static $delt_post = 'Deltoid Posterior';
    private static $delt_lat = 'Deltoid Lateral';
    private static $pec_mini = 'Pectoralis Minor';
    private static $lats = 'Latissimus Dorsi';
    private static $glutes = 'Gluteus Maximus';
    private static $quads = 'Quadriceps';
    private static $teres_major = 'Teres Major';
    private static $teres_minor = 'Teres Minor';
    private static $sol = 'Soleus';
    private static $calf = 'Gastrocnemius';

    private static $hamstrings = 'Hamstrings';
    private static $forearm_inner = 'Wrist Flexors';
    private static $forearm_outer = 'Wrist Extensors';


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
        $muscles[] = [self::$sternal, self::$max_intensity];

        $muscles[] = [self::$clavicular, self::$high_intensity];

        $muscles[] = [self::$triceps, self::$medium_intensity];
        $muscles[] = [self::$delt_ant, self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Bicep curl
        $exercise = Exercise::create(['name' => 'Bicep curl']);
        $muscles = [];
        $muscles[] = [self::$biceps, self::$max_intensity];

        $muscles[] = ['Brachialis', self::$medium_intensity];
        $muscles[] = ['Brachioradialis', self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Pull-up
        $exercise = Exercise::create(['name' => 'Pull-up']);
        $muscles = [];
        $muscles[] = [self::$lats, self::$max_intensity];

        $muscles[] = ['Brachialis', self::$medium_intensity];
        $muscles[] = ['Brachioradialis', self::$medium_intensity];
        $muscles[] = [self::$biceps, self::$medium_intensity];
        $muscles[] = [self::$teres_major, self::$medium_intensity];
        $muscles[] = [self::$delt_post, self::$medium_intensity];
        $muscles[] = ['Infraspinatus', self::$medium_intensity];
        $muscles[] = [self::$teres_minor, self::$medium_intensity];
        $muscles[] = ['Rhomboids', self::$medium_intensity];
        $muscles[] = ['Levator Scapulae', self::$medium_intensity];
        $muscles[] = [self::$traps_L, self::$medium_intensity];
        $muscles[] = [self::$traps_M, self::$medium_intensity];
        $muscles[] = [self::$pec_mini, self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Overhead press
        $exercise = Exercise::create(['name' => 'Overhead press']);
        $muscles = [];
        $muscles[] = [self::$delt_ant, self::$max_intensity];

        $muscles[] = [self::$triceps, self::$medium_intensity];
        $muscles[] = [self::$clavicular, self::$medium_intensity];
        $muscles[] = [self::$traps_L, self::$medium_intensity];
        $muscles[] = [self::$traps_M, self::$medium_intensity];
        $muscles[] = [self::$delt_lat, self::$medium_intensity];
        $muscles[] = ['Serratus Anterior', self::$medium_intensity];
        $exercise->attachToMuscle($muscles);

        // Skullcrusher
        $exercise = Exercise::create(['name' => 'Skull-crusher']);
        $muscles = [];
        $muscles[] = [self::$triceps, self::$max_intensity];

        $exercise->attachToMuscle($muscles);

        // Lateral raise
        $exercise = Exercise::create(['name' => 'Lateral raise']);
        $muscles = [];
        $muscles[] = [self::$delt_lat, self::$max_intensity];

        $muscles[] = [self::$delt_ant, self::$medium_intensity];
        $muscles[] = [self::$traps_L, self::$medium_intensity];
        $muscles[] = [self::$traps_M, self::$medium_intensity];
        $muscles[] = ['Serratus Anterior', self::$medium_intensity];
        $muscles[] = ['Supraspinatus', self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Squats
        $exercise = Exercise::create(['name' => 'Squats']);
        $muscles = [];
        $muscles[] = [self::$glutes, self::$max_intensity];
        $muscles[] = [self::$quads, self::$max_intensity];

        $muscles[] = ['Adductors', self::$medium_intensity];
        $muscles[] = [self::$sol, self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Front Squats
        $exercise = Exercise::create(['name' => 'Front squats']);
        $muscles = [];
        $muscles[] = [self::$quads, self::$max_intensity];
        $muscles[] = [self::$glutes, self::$max_intensity];

        $muscles[] = ['Adductors', self::$medium_intensity];
        $muscles[] = [self::$sol, self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Standing calf raise
        $exercise = Exercise::create(['name' => 'Standing calf raise']);
        $muscles = [];
        $muscles[] = [self::$calf, self::$max_intensity];
        $muscles[] = [self::$sol, self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        // Dips
        $exercise = Exercise::create(['name' => 'Triceps Dips']);
        $muscles = [];
        $muscles[] = [self::$triceps, self::$max_intensity];

        $muscles[] = [self::$delt_ant, self::$medium_intensity];
        $muscles[] = [self::$clavicular, self::$medium_intensity];
        $muscles[] = [self::$sternal, self::$medium_intensity];
        $muscles[] = [self::$pec_mini, self::$medium_intensity];
        $muscles[] = ['Rhomboids', self::$medium_intensity];
        $muscles[] = ['Levator Scapulae', self::$medium_intensity];
        $muscles[] = [self::$lats, self::$medium_intensity];

        $exercise->attachToMuscle($muscles);

        $exercise = Exercise::create(['name' => 'Deadlift']);
        $muscles = [];
        $muscles[] = [self::$glutes, self::$max_intensity];
        $muscles[] = ['Erector Spinae', self::$max_intensity];

        $muscles[] = [self::$lats, self::$high_intensity];
        $muscles[] = [self::$quads, self::$high_intensity];
        $muscles[] = [self::$hamstrings, self::$high_intensity];
        $muscles[] = [self::$forearm_inner, self::$high_intensity];
        $muscles[] = [self::$forearm_outer, self::$high_intensity];

        $muscles[] = [self::$biceps, self::$medium_intensity];
        $muscles[] = [self::$traps_U, self::$medium_intensity];
        $muscles[] = [self::$traps_M, self::$medium_intensity];
        $muscles[] = [self::$traps_L, self::$medium_intensity];


        $muscles[] = ['Adductor Magnus', self::$low_intensity];
        $muscles[] = [self::$sol, self::$low_intensity];
        $muscles[] = [self::$calf, self::$low_intensity];

        $exercise->attachToMuscle($muscles);

        $exercise = Exercise::create(['name' => 'Triceps pushdown']);
        $muscles = [];
        $muscles[] = [self::$triceps, self::$max_intensity];

        $exercise->attachToMuscle($muscles);

        $exercise = Exercise::create(['name' => 'Lying leg curl']);
        $muscles = [];
        $muscles[] = [self::$hamstrings, self::$max_intensity];

        $muscles[] = [self::$calf, self::$medium_intensity];

        $muscles[] = ['Sartorius', self::$low_intensity];
        $muscles[] = ['Gracilis', self::$low_intensity];
        $muscles[] = ['Popliteus', self::$low_intensity];

        $exercise->attachToMuscle($muscles);


    }
}
