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

        $exercise = Exercise::create(['name' => 'Overhead Press']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '40'];
        $muscles[] = ['Deltoid Anterior', '100'];
        $muscles[] = ['Deltoid Lateral', '80'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Pec. M. Clavicular Head', '80'];
        $muscles[] = ['Serratus Anterior', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $muscles[] = ['Triceps Brachii', '80'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Front Squats']);
        $muscles = [];
        $muscles[] = ['Adductors', '80'];
        $muscles[] = ['Deltoid Anterior', '60'];
        $muscles[] = ['Deltoid Lateral', '60'];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Gastrocnemius', '60'];
        $muscles[] = ['Gluteus Maximus', '100'];
        $muscles[] = ['Hamstrings', '60'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Pec. M. Clavicular Head', '60'];
        $muscles[] = ['Quadriceps', '100'];
        $muscles[] = ['Serratus Anterior', '60'];
        $muscles[] = ['Soleus', '80'];
        $muscles[] = ['Supraspinatus', '60'];
        $muscles[] = ['Trapezius Lower Fibers', '60'];
        $muscles[] = ['Trapezius Middle Fibers', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Squat']);
        $muscles = [];
        $muscles[] = ['Adductors', '80'];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Gastrocnemius', '60'];
        $muscles[] = ['Gluteus Maximus', '100'];
        $muscles[] = ['Hamstrings', '60'];
        $muscles[] = ['Obliques', '60'];
        $muscles[] = ['Quadriceps', '100'];
        $muscles[] = ['Rectus Abdominis', '60'];
        $muscles[] = ['Soleus', '80'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Lying Hamstring Curl']);
        $muscles = [];
        $muscles[] = ['Gastrocnemius', '80'];
        $muscles[] = ['Hamstrings', '100'];
        $muscles[] = ['Popliteus', '80'];
        $muscles[] = ['Quadriceps', '40'];
        $muscles[] = ['Sartorius', '80'];
        $muscles[] = ['Tibialis Anterior', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Leg Extension']);
        $muscles = [];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Quadriceps', '100'];
        $muscles[] = ['Trapezius Middle Fibers', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Bench Press']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '40'];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Pec. M. Clavicular Head', '100'];
        $muscles[] = ['Pec. M. Sternal Head', '100'];
        $muscles[] = ['Triceps Brachii', '80'];
        $exercise->attachToMuscle($muscles);

        $exercise = Exercise::create(['name' => 'Deadlift']);
        $muscles = [];
        $muscles[] = ['Adductors', '80'];
        $muscles[] = ['Erector Spinae', '100'];
        $muscles[] = ['Gluteus Maximus', '100'];
        $muscles[] = ['Hamstrings', '80'];
        $muscles[] = ['Latissimus Dorsi', '100'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Obliques', '60'];
        $muscles[] = ['Quadriceps', '80'];
        $muscles[] = ['Rectus Abdominis', '60'];
        $muscles[] = ['Rhomboids', '60'];
        $muscles[] = ['Soleus', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $muscles[] = ['Biceps Brachii', '60'];
        $muscles[] = ['Trapezius Lower Fibers', '60'];
        $muscles[] = ['Wrist Extensors', '80'];
        $muscles[] = ['Wrist Flexors', '80'];
        $exercise->attachToMuscle($muscles);





        $exercise = Exercise::create(['name' => 'Face Pull']);
        $muscles = [];
        $muscles[] = ['Adductors', '40'];
        $muscles[] = ['Biceps Brachii', '60'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Lateral', '80'];
        $muscles[] = ['Deltoid Posterior', '100'];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Gluteus Maximus', '60'];
        $muscles[] = ['Hamstrings', '40'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Minor', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Seated Row']);
        $muscles = [];
        $muscles[] = ['Adductors', '60'];
        $muscles[] = ['Biceps Brachii', '60'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Posterior', '80'];
        $muscles[] = ['Erector Spinae', '80'];
        $muscles[] = ['Gluteus Maximus', '60'];
        $muscles[] = ['Hamstrings', '60'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Latissimus Dorsi', '80'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Teres Minor', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Triceps Brachii', '40'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Barbell Shrug']);
        $muscles = [];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Levator Scapulae', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Trapezius Upper Fibers', '100'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Pull-up']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '80'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Posterior', '80'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Latissimus Dorsi', '100'];
        $muscles[] = ['Levator Scapulae', '80'];
        $muscles[] = ['Pectoralis Minor', '80'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Teres Minor', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Triceps Brachii', '40'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Barbell Curl']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '100'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Anterior', '60'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Trapezius Middle Fibers', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $muscles[] = ['Wrist Flexors', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Barbell Row']);
        $muscles = [];
        $muscles[] = ['Adductors', '60'];
        $muscles[] = ['Biceps Brachii', '60'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Posterior', '80'];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Gluteus Maximus', '60'];
        $muscles[] = ['Hamstrings', '60'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Latissimus Dorsi', '80'];
        $muscles[] = ['Obliques', '60'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Rectus Abdominis', '60'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Teres Minor', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Triceps Brachii', '40'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Cable Pulldown']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '80'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Posterior', '80'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Latissimus Dorsi', '100'];
        $muscles[] = ['Levator Scapulae', '80'];
        $muscles[] = ['Pectoralis Minor', '80'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Teres Minor', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Triceps Brachii', '40'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Chest Supported Row']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '60'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '80'];
        $muscles[] = ['Deltoid Posterior', '80'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Latissimus Dorsi', '80'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Teres Minor', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Triceps Brachii', '40'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Reverse Fly']);
        $muscles = [];
        $muscles[] = ['Deltoid Lateral', '80'];
        $muscles[] = ['Deltoid Posterior', '100'];
        $muscles[] = ['Infraspinatus', '80'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Minor', '100'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Triceps Brachii', '60'];
        $muscles[] = ['Wrist Extensors', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Cable Bent-over Pullover']);
        $muscles = [];
        $muscles[] = ['Deltoid Posterior', '80'];
        $muscles[] = ['Latissimus Dorsi', '80'];
        $muscles[] = ['Levator Scapulae', '80'];
        $muscles[] = ['Obliques', '60'];
        $muscles[] = ['Pec. M. Clavicular Head', '60'];
        $muscles[] = ['Pec. M. Sternal Head', '80'];
        $muscles[] = ['Pectoralis Minor', '80'];
        $muscles[] = ['Rectus Abdominis', '60'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Triceps Brachii', '60'];
        $muscles[] = ['Wrist Flexors', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Dumbbell Hammer Curl']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '80'];
        $muscles[] = ['Brachialis', '80'];
        $muscles[] = ['Brachioradialis', '100'];
        $muscles[] = ['Deltoid Anterior', '60'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Trapezius Middle Fibers', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $muscles[] = ['Wrist Extensors', '40'];
        $muscles[] = ['Wrist Flexors', '40'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Dumbbell Incline Bench Press']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '40'];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Pec. M. Clavicular Head', '100'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Triceps Brachii', '80'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Skull Crusher']);
        $muscles = [];
        $muscles[] = ['Deltoid Anterior', '60'];
        $muscles[] = ['Deltoid Posterior', '60'];
        $muscles[] = ['Latissimus Dorsi', '60'];
        $muscles[] = ['Pec. M. Clavicular Head', '60'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Teres Major', '60'];
        $muscles[] = ['Triceps Brachii', '100'];
        $muscles[] = ['Wrist Flexors', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Dumbbell Lateral Raise']);
        $muscles = [];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Deltoid Lateral', '100'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Serratus Anterior', '60'];
        $muscles[] = ['Supraspinatus', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $muscles[] = ['Wrist Extensors', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Lever Lateral Raise']);
        $muscles = [];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Deltoid Lateral', '100'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Serratus Anterior', '60'];
        $muscles[] = ['Supraspinatus', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Barbell Incline Bench Press']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '40'];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Pec. M. Clavicular Head', '100'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Triceps Brachii', '80'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Chest Dip']);
        $muscles = [];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Latissimus Dorsi', '80'];
        $muscles[] = ['Levator Scapulae', '80'];
        $muscles[] = ['Pec. M. Clavicular Head', '80'];
        $muscles[] = ['Pec. M. Sternal Head', '100'];
        $muscles[] = ['Pectoralis Minor', '80'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Teres Major', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '60'];
        $muscles[] = ['Triceps Brachii', '80'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Triceps Dip']);
        $muscles = [];
        $muscles[] = ['Biceps Brachii', '60'];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Latissimus Dorsi', '80'];
        $muscles[] = ['Levator Scapulae', '80'];
        $muscles[] = ['Pec. M. Clavicular Head', '80'];
        $muscles[] = ['Pec. M. Sternal Head', '80'];
        $muscles[] = ['Pectoralis Minor', '80'];
        $muscles[] = ['Rhomboids', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '60'];
        $muscles[] = ['Triceps Brachii', '100'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Cable Lateral Raise']);
        $muscles = [];
        $muscles[] = ['Deltoid Anterior', '80'];
        $muscles[] = ['Deltoid Lateral', '100'];
        $muscles[] = ['Serratus Anterior', '60'];
        $muscles[] = ['Supraspinatus', '80'];
        $muscles[] = ['Trapezius Lower Fibers', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '80'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $muscles[] = ['Wrist Extensors', '60'];
        $exercise->attachToMuscle($muscles);







        $exercise = Exercise::create(['name' => 'Cable Pushdown']);
        $muscles = [];
        $muscles[] = ['Deltoid Posterior', '60'];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Latissimus Dorsi', '60'];
        $muscles[] = ['Obliques', '60'];
        $muscles[] = ['Pec. M. Sternal Head', '60'];
        $muscles[] = ['Pectoralis Minor', '60'];
        $muscles[] = ['Rectus Abdominis', '60'];
        $muscles[] = ['Teres Major', '60'];
        $muscles[] = ['Trapezius Lower Fibers', '60'];
        $muscles[] = ['Triceps Brachii', '100'];
        $muscles[] = ['Wrist Flexors', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Standing Calf Raise']);
        $muscles = [];
        $muscles[] = ['Gastrocnemius', '100'];
        $muscles[] = ['Levator Scapulae', '60'];
        $muscles[] = ['Soleus', '80'];
        $muscles[] = ['Trapezius Middle Fibers', '60'];
        $muscles[] = ['Trapezius Upper Fibers', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Seated Calf Raise']);
        $muscles = [];
        $muscles[] = ['Gastrocnemius', '80'];
        $muscles[] = ['Soleus', '100'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Seated Leg Curl']);
        $muscles = [];
        $muscles[] = ['Gastrocnemius', '80'];
        $muscles[] = ['Gracilis', '80'];
        $muscles[] = ['Hamstrings', '100'];
        $muscles[] = ['Popliteus', '80'];
        $muscles[] = ['Sartorius', '80'];
        $muscles[] = ['Tibialis Anterior', '60'];
        $exercise->attachToMuscle($muscles);



        $exercise = Exercise::create(['name' => 'Leg Press']);
        $muscles = [];
        $muscles[] = ['Adductors', '80'];
        $muscles[] = ['Gastrocnemius', '60'];
        $muscles[] = ['Gluteus Maximus', '80'];
        $muscles[] = ['Hamstrings', '60'];
        $muscles[] = ['Quadriceps', '100'];
        $muscles[] = ['Soleus', '80'];
        $exercise->attachToMuscle($muscles);

        $exercise = Exercise::create(['name' => 'Lunge']);
        $muscles = [];
        $muscles[] = ['Adductors', '80'];
        $muscles[] = ['Erector Spinae', '60'];
        $muscles[] = ['Gastrocnemius', '60'];
        $muscles[] = ['Gluteus Maximus', '100'];
        $muscles[] = ['Gluteus Medius', '60'];
        $muscles[] = ['Gluteus Minimus', '60'];
        $muscles[] = ['Hamstrings', '60'];
        $muscles[] = ['Obliques', '60'];
        $muscles[] = ['Quadratus Lumborum', '60'];
        $muscles[] = ['Quadriceps', '80'];
        $muscles[] = ['Soleus', '80'];
        $muscles[] = ['Tibialis Anterior', '60'];
        $exercise->attachToMuscle($muscles);


    }
}
