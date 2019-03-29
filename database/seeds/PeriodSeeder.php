<?php

use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('periods')->insert(['createdate' => $date, 'description' => 'Manhã']);
        DB::table('periods')->insert(['createdate' => $date, 'description' => 'Tarde']);
        DB::table('periods')->insert(['createdate' => $date, 'description' => 'Noite']);
    }
}
