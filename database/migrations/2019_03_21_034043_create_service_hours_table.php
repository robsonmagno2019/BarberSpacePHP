<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceHoursTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('service_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->string('description', 10);
            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');
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
        Schema::dropIfExists('service_hours');
    }
}
