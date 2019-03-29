<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('avaliations', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->double('note');
            $table->string('comment', 160);
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->integer('barber_id')->unsigned()->nullable();
            $table->foreign('barber_id')->references('id')->on('barbers');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('avaliations');
    }
}
