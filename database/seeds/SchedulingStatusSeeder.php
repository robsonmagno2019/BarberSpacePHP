<?php

use Illuminate\Database\Seeder;

class SchedulingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('scheduling_statuses')->insert(['createdate' => $date, 'description' => 'Criado']);
        DB::table('scheduling_statuses')->insert(['createdate' => $date, 'description' => 'Confirmado']);
        DB::table('scheduling_statuses')->insert(['createdate' => $date, 'description' => 'Concluído']);
        DB::table('scheduling_statuses')->insert(['createdate' => $date, 'description' => 'Remarcado']);
        DB::table('scheduling_statuses')->insert(['createdate' => $date, 'description' => 'Cancelado']);
    }
}
