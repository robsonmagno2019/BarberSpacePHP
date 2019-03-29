<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->string('name', 60);
            $table->string('email', 160)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->boolean('active');
            $table->boolean('is_superadmin');
            $table->boolean('is_admin');
            $table->boolean('is_barber');
            $table->boolean('is_customer');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
