<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('plans')->insert(['createdate' => $date, 'description' => 'Free', 'price' => 0]);
        DB::table('plans')->insert(['createdate' => $date, 'description' => 'Light', 'price' => 80]);
        DB::table('plans')->insert(['createdate' => $date, 'description' => 'Plus', 'price' => 160]);
        DB::table('plans')->insert(['createdate' => $date, 'description' => 'Premium', 'price' => 180]);
    }
}
