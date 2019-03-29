<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDurationContractsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('duration_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('createdate');
            $table->string('description', 20)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('duration_contracts');
    }
}
