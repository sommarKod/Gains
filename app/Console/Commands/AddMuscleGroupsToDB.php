<?php

namespace App\Console\Commands;

use App\MuscleGroup;
use Illuminate\Console\Command;
use App\Muscle;
use DB;

class AddMuscleGroupsToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:musclegroups';

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
        MuscleGroup::truncate();
        DB::statement("TRUNCATE TABLE `muscle_muscle_group`");
        DB::statement("SET foreign_key_checks=1");




        $muscleGroup = MuscleGroup::create(['name' => 'Chest']);
        $muscles = [];
        $muscles[] = 'Pec. M. Sternal Head';
        $muscles[] = 'Pec. M. Clavicular Head';
        $muscles[] = 'Pectoralis Minor';
        $muscles[] = 'Serratus Anterior';


        $muscleGroup->addMuscles($muscles);

        $muscleGroup = MuscleGroup::create(['name' => 'Back']);
        $muscles = [];
        $muscles[] = 'Latissimus Dorsi';
        $muscles[] = 'Rhomboids';
        $muscles[] = 'Trapezius Lower Fibers';
        $muscles[] = 'Trapezius Middle Fibers';
        $muscles[] = 'Erector Spinae';

        $muscleGroup->addMuscles($muscles);

        $muscleGroup->addMuscles($muscles);

        $muscleGroup = MuscleGroup::create(['name' => 'Upper Back']);
        $muscles = [];
        $muscles[] = 'Latissimus Dorsi';
        $muscles[] = 'Rhomboids';
        $muscles[] = 'Trapezius Lower Fibers';
        $muscles[] = 'Trapezius Middle Fibers';


        $muscleGroup->addMuscles($muscles);

        $muscleGroup->addMuscles($muscles);

        $muscleGroup = MuscleGroup::create(['name' => 'Lower Back']);
        $muscles = [];
        $muscles[] = 'Erector Spinae';

        $muscleGroup->addMuscles($muscles);

        $muscleGroup = MuscleGroup::create(['name' => 'Traps']);
        $muscles = [];

        $muscles[] = 'Trapezius Upper Fibers';
        $muscles[] = 'Levator Scapulae';

        $muscleGroup->addMuscles($muscles);

        $muscleGroup = MuscleGroup::create(['name' => 'Shoulders']);
        $muscles = [];

        $muscles[] = 'Deltoid Anterior';
        $muscles[] = 'Deltoid Lateral';
        $muscles[] = 'Deltoid Posterior';
        $muscles[] = 'Infraspinatus';
        $muscles[] = 'Supraspinatus';
        $muscles[] = 'Teres Major';
        $muscles[] = 'Teres Minor';

        $muscleGroup->addMuscles($muscles);
        /*

                MuscleGroup::create(['name' => 'Shoulders']);

                MuscleGroup::create(['name' => 'Upper Arms']);
                MuscleGroup::create(['name' => 'Biceps']);
                MuscleGroup::create(['name' => 'Triceps']);

                MuscleGroup::create(['name' => 'Forearms']);
                MuscleGroup::create(['name' => 'Lower arms']);

                MuscleGroup::create(['name' => 'Thighs']);
                MuscleGroup::create(['name' => 'Legs']);
                MuscleGroup::create(['name' => 'Calf']);
        */

    }
}
