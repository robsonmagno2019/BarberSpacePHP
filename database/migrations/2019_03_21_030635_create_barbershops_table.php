<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarbershopsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('barbershops', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->string('name', 60);
            $table->string('email', 160)->unique()->nullable();
            $table->string('coverphoto')->nullable();
            $table->string('logo')->nullable();
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('street', 40)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('district', 40)->nullable();
            $table->string('city', 40)->nullable();
            $table->string('state', 40)->nullable();
            $table->string('zipcode', 40)->nullable();
            $table->string('complement', 160)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('barbershops');
    }
}
