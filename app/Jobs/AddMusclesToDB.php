<?php

namespace App\Jobs;

use App\Jobs\Job;
use DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddMusclesToDB extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('muscles')->insert(
            ['name' => 'Adductors']
        );
        DB::table('muscles')->insert(
            ['name' => 'Biceps Brachii']
        );
        DB::table('muscles')->insert(
            ['name' => 'Brachialis']
        );
        DB::table('muscles')->insert(
            ['name' => 'Brachioradialis']
        );
        DB::table('muscles')->insert(
            ['name' => 'Deltoid Anterior']
        );
        DB::table('muscles')->insert(
            ['name' => 'Deltoid Lateral']
        );
        DB::table('muscles')->insert(
            ['name' => 'Deltoid Posterior']
        );
        DB::table('muscles')->insert(
            ['name' => 'Deep Hip External Rotators']
        );
        DB::table('muscles')->insert(
            ['name' => 'Erector Spinae']
        );
        DB::table('muscles')->insert(
            ['name' => 'Gastrocnemius']
        );
        DB::table('muscles')->insert(
            ['name' => 'Gluteus Maximus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Gluteus Medius']
        );
        DB::table('muscles')->insert(
            ['name' => 'Gluteus Minimus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Gracilis']
        );
        DB::table('muscles')->insert(
            ['name' => 'Hamstrings']
        );
        DB::table('muscles')->insert(
            ['name' => 'Iliopsoas']
        );
        DB::table('muscles')->insert(
            ['name' => 'Infraspinatus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Latissimus Dorsi']
        );
        DB::table('muscles')->insert(
            ['name' => 'Levator Scapulae']
        );
        DB::table('muscles')->insert(
            ['name' => 'Obliques']
        );
        DB::table('muscles')->insert(
            ['name' => 'Pectineous']
        );
        DB::table('muscles')->insert(
            ['name' => 'Pectoralis Major Clavicular Head']
        );
        DB::table('muscles')->insert(
            ['name' => 'Pectoralis Major Sternal Head']
        );
        DB::table('muscles')->insert(
            ['name' => 'Pectoralis Minor']
        );
        DB::table('muscles')->insert(
            ['name' => 'Popliteus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Quadratus Lumborum']
        );
        DB::table('muscles')->insert(
            ['name' => 'Quadriceps']
        );
        DB::table('muscles')->insert(
            ['name' => 'Rectus Abdominis']
        );
        DB::table('muscles')->insert(
            ['name' => 'Rhomboids']
        );
        DB::table('muscles')->insert(
            ['name' => 'Sartorius']
        );
        DB::table('muscles')->insert(
            ['name' => 'Serratus Anterior']
        );
        DB::table('muscles')->insert(
            ['name' => 'Soleus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Splenius']
        );
        DB::table('muscles')->insert(
            ['name' => 'Sternocleidomastoid']
        );
        DB::table('muscles')->insert(
            ['name' => 'Subscapularis']
        );
        DB::table('muscles')->insert(
            ['name' => 'Supraspinatus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Tensor Fasciae Latae']
        );
        DB::table('muscles')->insert(
            ['name' => 'Teres Major']
        );
        DB::table('muscles')->insert(
            ['name' => 'Teres Minor']
        );
        DB::table('muscles')->insert(
            ['name' => 'Tibialis Anterior']
        );
        DB::table('muscles')->insert(
            ['name' => 'Transverse Abdominus']
        );
        DB::table('muscles')->insert(
            ['name' => 'Trapezius Lower Fibers']
        );
        DB::table('muscles')->insert(
            ['name' => 'Trapezius Middle Fibers']
        );
        DB::table('muscles')->insert(
            ['name' => 'Trapezius Upper Fibers']
        );
        DB::table('muscles')->insert(
            ['name' => 'Triceps Brachii']
        );
        DB::table('muscles')->insert(
            ['name' => 'Wrist Extensors']
        );
        DB::table('muscles')->insert(
            ['name' => 'Wrist Flexors']
        );
    }
}
