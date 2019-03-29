<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarbershopAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('barbershop_agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->dateTime('enddate');
            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->integer('barbershop_id')->unsigned();
            $table->foreign('barbershop_id')->references('id')->on('barbershops');
            $table->integer('duration_contract_id')->unsigned();
            $table->foreign('duration_contract_id')->references('id')->on('duration_contracts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('barbershop_agreements');
    }
}
