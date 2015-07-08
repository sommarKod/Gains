<?php

namespace App\Console\Commands;

use App\Muscle;
use Illuminate\Console\Command;
use DB;

class AddMusclesToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'databasefiller:muscles';

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
        Muscle::create(['name' => 'Adductors']);
        Muscle::create(['name' => 'Biceps Brachii']);
        Muscle::create(['name' => 'Brachialis']);
        Muscle::create(['name' => 'Brachioradialis']);
        Muscle::create(['name' => 'Deltoid Anterior']);
        Muscle::create(['name' => 'Deltoid Lateral']);
        Muscle::create(['name' => 'Deltoid Posterior']);
        Muscle::create(['name' => 'Deep Hip External Rotators']);
        Muscle::create(['name' => 'Erector Spinae']);
        Muscle::create(['name' => 'Gastrocnemius']);
        Muscle::create(['name' => 'Gluteus Maximus']);
        Muscle::create(['name' => 'Gluteus Medius']);
        Muscle::create(['name' => 'Gluteus Minimus']);
        Muscle::create(['name' => 'Gracilis']);
        Muscle::create(['name' => 'Hamstrings']);
        Muscle::create(['name' => 'Iliopsoas']);
        Muscle::create(['name' => 'Infraspinatus']);
        Muscle::create(['name' => 'Latissimus Dorsi']);
        Muscle::create(['name' => 'Levator Scapulae']);
        Muscle::create(['name' => 'Obliques']);
        Muscle::create(['name' => 'Pectineous']);
        Muscle::create(['name' => 'Pectoralis Major Clavicular Head']);
        Muscle::create(['name' => 'Pectoralis Major Sternal Head']);
        Muscle::create(['name' => 'Pectoralis Minor']);
        Muscle::create(['name' => 'Popliteus']);
        Muscle::create(['name' => 'Quadratus Lumborum']);
        Muscle::create(['name' => 'Quadriceps']);
        Muscle::create(['name' => 'Rectus Abdominis']);
        Muscle::create(['name' => 'Rhomboids']);
        Muscle::create(['name' => 'Sartorius']);
        Muscle::create(['name' => 'Serratus Anterior']);
        Muscle::create(['name' => 'Soleus']);
        Muscle::create(['name' => 'Splenius']);
        Muscle::create(['name' => 'Sternocleidomastoid']);
        Muscle::create(['name' => 'Subscapularis']);
        Muscle::create(['name' => 'Supraspinatus']);
        Muscle::create(['name' => 'Tensor Fasciae Latae']);
        Muscle::create(['name' => 'Teres Major']);
        Muscle::create(['name' => 'Teres Minor']);
        Muscle::create(['name' => 'Tibialis Anterior']);
        Muscle::create(['name' => 'Transverse Abdominus']);
        Muscle::create(['name' => 'Trapezius Lower Fibers']);
        Muscle::create(['name' => 'Trapezius Middle Fibers']);
        Muscle::create(['name' => 'Trapezius Upper Fibers']);
        Muscle::create(['name' => 'Triceps Brachii']);
        Muscle::create(['name' => 'Wrist Extensors']);
        Muscle::create(['name' => 'Wrist Flexors']);

    }
}
