<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerCarParkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_car_park', function(Blueprint $table)
        {
            $table->increments('owner_car_park_id');
            $table->integer('owner_id');
            $table->integer('car_park_no')->nullable();
            $table->integer('loc_area_text')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lots');
    }
}
