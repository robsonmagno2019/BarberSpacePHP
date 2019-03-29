<?php

use Illuminate\Database\Seeder;

class DurationContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '01 Mês']);
        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '03 Meses']);
        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '06 Meses']);
        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '09 Meses']);
        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '12 Meses']);
        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '24 Meses']);
        DB::table('duration_contracts')->insert(['createdate' => $date, 'description' => '36 Meses']);
    }
}
