<?php

namespace App\Console\Commands;

use App\Muscles;
use Illuminate\Console\Command;

class AddMusclesToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addmusclestodb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add muscles to the database';

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
        Muscle::firstOrCreate(
            ['name' => 'Adductors']
        );
        Muscle::firstOrCreate(
            ['name' => 'Biceps Brachii']
        );
        Muscle::firstOrCreate(
            ['name' => 'Brachialis']
        );
        Muscle::firstOrCreate(
            ['name' => 'Brachioradialis']
        );
        Muscle::firstOrCreate(
            ['name' => 'Deltoid Anterior']
        );
        Muscle::firstOrCreate(
            ['name' => 'Deltoid Lateral']
        );
        Muscle::firstOrCreate(
            ['name' => 'Deltoid Posterior']
        );
        Muscle::firstOrCreate(
            ['name' => 'Deep Hip External Rotators']
        );
        Muscle::firstOrCreate(
            ['name' => 'Erector Spinae']
        );
        Muscle::firstOrCreate(
            ['name' => 'Gastrocnemius']
        );
        Muscle::firstOrCreate(
            ['name' => 'Gluteus Maximus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Gluteus Medius']
        );
        Muscle::firstOrCreate(
            ['name' => 'Gluteus Minimus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Gracilis']
        );
        Muscle::firstOrCreate(
            ['name' => 'Hamstrings']
        );
        Muscle::firstOrCreate(
            ['name' => 'Iliopsoas']
        );
        Muscle::firstOrCreate(
            ['name' => 'Infraspinatus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Latissimus Dorsi']
        );
        Muscle::firstOrCreate(
            ['name' => 'Levator Scapulae']
        );
        Muscle::firstOrCreate(
            ['name' => 'Obliques']
        );
        Muscle::firstOrCreate(
            ['name' => 'Pectineous']
        );
        Muscle::firstOrCreate(
            ['name' => 'Pectoralis Major Clavicular Head']
        );
        Muscle::firstOrCreate(
            ['name' => 'Pectoralis Major Sternal Head']
        );
        Muscle::firstOrCreate(
            ['name' => 'Pectoralis Minor']
        );
        Muscle::firstOrCreate(
            ['name' => 'Popliteus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Quadratus Lumborum']
        );
        Muscle::firstOrCreate(
            ['name' => 'Quadriceps']
        );
        Muscle::firstOrCreate(
            ['name' => 'Rectus Abdominis']
        );
        Muscle::firstOrCreate(
            ['name' => 'Rhomboids']
        );
        Muscle::firstOrCreate(
            ['name' => 'Sartorius']
        );
        Muscle::firstOrCreate(
            ['name' => 'Serratus Anterior']
        );
        Muscle::firstOrCreate(
            ['name' => 'Soleus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Splenius']
        );
        Muscle::firstOrCreate(
            ['name' => 'Sternocleidomastoid']
        );
        Muscle::firstOrCreate(
            ['name' => 'Subscapularis']
        );
        Muscle::firstOrCreate(
            ['name' => 'Supraspinatus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Tensor Fasciae Latae']
        );
        Muscle::firstOrCreate(
            ['name' => 'Teres Major']
        );
        Muscle::firstOrCreate(
            ['name' => 'Teres Minor']
        );
        Muscle::firstOrCreate(
            ['name' => 'Tibialis Anterior']
        );
        Muscle::firstOrCreate(
            ['name' => 'Transverse Abdominus']
        );
        Muscle::firstOrCreate(
            ['name' => 'Trapezius Lower Fibers']
        );
        Muscle::firstOrCreate(
            ['name' => 'Trapezius Middle Fibers']
        );
        Muscle::firstOrCreate(
            ['name' => 'Trapezius Upper Fibers']
        );
        Muscle::firstOrCreate(
            ['name' => 'Triceps Brachii']
        );
        Muscle::firstOrCreate(
            ['name' => 'Wrist Extensors']
        );
        Muscle::firstOrCreate(
            ['name' => 'Wrist Flexors']
        );
    }
}
