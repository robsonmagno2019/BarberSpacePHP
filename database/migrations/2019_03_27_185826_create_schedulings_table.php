<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedulings', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->dateTime('schedulingdate');
            $table->integer('service_hour_id')->unsigned();
            $table->foreign('service_hour_id')->references('id')->on('service_hours');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors');
            $table->integer('scheduling_status_id')->unsigned();
            $table->foreign('scheduling_status_id')->references('id')->on('scheduling_statuses');
            $table->string('customeravulse', 60)->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->integer('barber_id')->unsigned()->nullable();
            $table->foreign('barber_id')->references('id')->on('barbers');
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
        Schema::dropIfExists('schedulings');
    }
}
