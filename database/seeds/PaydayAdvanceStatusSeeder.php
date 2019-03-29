<?php

use Illuminate\Database\Seeder;

class PaydayAdvanceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('payday_advance_statuses')->insert(['createdate' => $date, 'description' => 'Criado']);
        DB::table('payday_advance_statuses')->insert(['createdate' => $date, 'description' => 'Pago']);
        DB::table('payday_advance_statuses')->insert(['createdate' => $date, 'description' => 'Pendente']);
    }
}
