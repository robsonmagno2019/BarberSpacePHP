<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sale_promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->dateTime('enddate');
            $table->string('description', 100);
            $table->double('price');
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('sale_promotions');
    }
}
