<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarageSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garage_spaces', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('number');
            $table->string('floor');
            $table->string('width');
            $table->string('length');
            $table->boolean('enable');
            $table->string('garage_id');
            $table->string('car_id');
            $table->timestamps();

            $table->foreign('garage_id')->references('id')->on('garages');
            $table->foreign('car_id')->references('id')->on('cars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garage_spaces');
    }
}
