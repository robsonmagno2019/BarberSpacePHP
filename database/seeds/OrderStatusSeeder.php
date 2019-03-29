<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('order_statuses')->insert(['createdate' => $date, 'description' => 'Criado']);
        DB::table('order_statuses')->insert(['createdate' => $date, 'description' => 'Pago']);
        DB::table('order_statuses')->insert(['createdate' => $date, 'description' => 'Pendente']);
    }
}
