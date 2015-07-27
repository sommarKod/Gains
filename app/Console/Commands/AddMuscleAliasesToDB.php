<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\MuscleAlias;
use App\Muscle;

class AddMuscleAliasesToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:musclealiases';

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
        MuscleAlias::truncate();
        DB::statement("TRUNCATE TABLE `muscle_aliases`");
        DB::statement("SET foreign_key_checks=1");

        $muscle_id = Muscle::where('name', 'Adductors')->first()->id;
        MuscleAlias::create(['name' => 'Inner Thigh', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Biceps Brachii')->first()->id;
        MuscleAlias::create(['name' => 'Biceps', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Brachialis')->first()->id;
        MuscleAlias::create(['name' => 'Lower Biceps', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Brachioradialis')->first()->id;
        MuscleAlias::create(['name' => 'Upper Forearm', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Deltoid Anterior')->first()->id;
        MuscleAlias::create(['name' => 'Front delts', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Front shoulders', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Deltoid Lateral')->first()->id;
        MuscleAlias::create(['name' => 'Side Delts', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Side shoulders', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Deltoid Posterior')->first()->id;
        MuscleAlias::create(['name' => 'Rear Delts', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Rear shoulders', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Lateral Rotator Group')->first()->id;
        MuscleAlias::create(['name' => 'Hip rotators', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Erector Spinae')->first()->id;
        MuscleAlias::create(['name' => 'Lower Back', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Gastrocnemius')->first()->id;
        MuscleAlias::create(['name' => 'Calf', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Gluteus Maximus')->first()->id;
        MuscleAlias::create(['name' => 'Butt', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Glutes', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Gluteus Medius')->first()->id;
        MuscleAlias::create(['name' => 'Hip', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Hip abductor', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Gluteus Minimus')->first()->id;
        MuscleAlias::create(['name' => 'Small hip', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Gracilis')->first()->id;
        MuscleAlias::create(['name' => 'Hip Adductor', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Hamstrings')->first()->id;
        MuscleAlias::create(['name' => 'Rear thigh', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Iliopsoas')->first()->id;
        MuscleAlias::create(['name' => 'Hip flexors', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Infraspinatus')->first()->id;
        MuscleAlias::create(['name' => 'Rotatory cuff', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Latissimus Dorsi')->first()->id;
        MuscleAlias::create(['name' => 'Lats', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Levator Scapulae')->first()->id;
        MuscleAlias::create(['name' => 'Upper shoulders', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Rear neck', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Obliques')->first()->id;
        MuscleAlias::create(['name' => 'Side waist', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Side core', 'muscle_id' => $muscle_id]);

        

        $muscle_id = Muscle::where('name', 'Pec. M. Clavicular Head')->first()->id;
        MuscleAlias::create(['name' => 'Upper chest', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Upper pecs', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Pec. M. Sternal Head')->first()->id;
        MuscleAlias::create(['name' => 'Chest', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Lower pecs', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Pectoralis Minor')->first()->id;
        MuscleAlias::create(['name' => 'Minor pecs', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Popliteus')->first()->id;
        MuscleAlias::create(['name' => 'Knee flexor', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Quadriceps')->first()->id;
        MuscleAlias::create(['name' => 'Front thigh', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Quads', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Rectus Abdominis')->first()->id;
        MuscleAlias::create(['name' => 'Abs', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Abdominal', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Belly', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Subscapularis')->first()->id;
        MuscleAlias::create(['name' => 'Rotator cuff', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Tibialis Anterior')->first()->id;
        MuscleAlias::create(['name' => 'Shin', 'muscle_id' => $muscle_id]);
        MuscleAlias::create(['name' => 'Tibias', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Trapezius Lower Fibers')->first()->id;
        MuscleAlias::create(['name' => 'Lower traps', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Trapezius Middle Fibers')->first()->id;
        MuscleAlias::create(['name' => 'Traps', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Trapezius Upper Fibers')->first()->id;
        MuscleAlias::create(['name' => 'Upper Traps', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Triceps Brachii')->first()->id;
        MuscleAlias::create(['name' => 'Triceps', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Wrist Extensors')->first()->id;
        MuscleAlias::create(['name' => 'Lower forearm', 'muscle_id' => $muscle_id]);

        $muscle_id = Muscle::where('name', 'Triceps Brachii')->first()->id;
        MuscleAlias::create(['name' => 'Inner forearm', 'muscle_id' => $muscle_id]);





    }
}
