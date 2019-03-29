<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->string('number', 20);
            $table->integer('order_status_id')->unsigned();
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->string('customeravulse', 60);
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->integer('barber_id')->unsigned()->nullable();
            $table->foreign('barber_id')->references('id')->on('barbers');
            $table->integer('barbershop_id')->unsigned();
            $table->foreign('barbershop_id')->references('id')->on('barbershops');
            $table->double('valueadmin');
            $table->double('valuebarber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
