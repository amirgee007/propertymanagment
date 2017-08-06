<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeterRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::create('meter_rate', function(Blueprint $table)
//        {
//            $table->increments('meter_rate_id');
//            $table->integer('meter_id');
//            $table->string('meter_number');
//            $table->bigInteger('from');
//            $table->bigInteger('to');
//            $table->float('rate');
//            $table->timestamps();
//
//        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('meter_rate');
    }
}
