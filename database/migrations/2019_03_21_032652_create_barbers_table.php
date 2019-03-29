<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarbersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('barbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_of_remuneration_id')->unsigned();
            $table->foreign('type_of_remuneration_id')->references('id')->on('type_of_remunerations');
            $table->integer('percentage')->nullable();
            $table->double('salary')->nullable();
            $table->string('phone', 13)->unique()->nullable();
            $table->string('photo')->nullable();
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('barbershop_id')->unsigned();
            $table->foreign('barbershop_id')->references('id')->on('barbershops');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('barbers');
    }
}
