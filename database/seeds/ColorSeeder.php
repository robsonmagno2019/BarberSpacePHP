<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Amarelo Claro', 'code' => '#FFF59D']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Amarelo', 'code' => '#FFEB3B']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Amarelo Escuro', 'code' => '#F9A825']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Azul Claro', 'code' => '#81D4FA']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Azul', 'code' => '#03A9F4']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Azul Escuro', 'code' => '#01579B']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Roxo Claro', 'code' => '#B39DDB']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Roxo', 'code' => '#673AB7']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Roxo Escuro', 'code' => '#4527A0']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Verde Claro', 'code' => '#A5D6A7']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Verde', 'code' => '#4CAF50']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Verde Escuro', 'code' => '#1B5E20']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Vermelho Claro', 'code' => '#EF9A9A']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Vermelho', 'code' => '#F44336']);
        DB::table('colors')->insert(['createdate' => $date, 'name' => 'Vermelho Escuro', 'code' => '#B71C1C']);
    }
}
