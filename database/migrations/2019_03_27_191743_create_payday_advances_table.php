<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaydayAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payday_advances', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->string('description', 40);
            $table->double('price');
            $table->integer('payday_advance_status_id')->unsigned();
            $table->foreign('payday_advance_status_id')->references('id')->on('payday_advance_statuses');
            $table->integer('barber_id')->unsigned();
            $table->foreign('barber_id')->references('id')->on('barbers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payday_advances');
    }
}
