<?php

use Illuminate\Database\Seeder;

class TypeOfRemunerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('type_of_remunerations')->insert(['createdate' => $date, 'description' => 'Porcentagem']);
        DB::table('type_of_remunerations')->insert(['createdate' => $date, 'description' => 'Salário']);
    }
}
