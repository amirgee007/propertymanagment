<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeterReadingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::create('meter_reading', function(Blueprint $table)
//        {
//
//            $table->increments('meter_reading_id');
//            $table->integer('meter_id');
//            $table->string('reading_number');
//            $table->integer('lot_no');
//            $table->dateTime('last_reading_date')->nullable();
//            $table->float('last_reading')->nullable();
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
//        Schema::drop('meter_reading');
    }
}
