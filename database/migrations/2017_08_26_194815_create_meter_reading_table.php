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

        Schema::create('meter_reading', function(Blueprint $table)
        {

            $table->increments('id');

            $table->integer('meter_id')->unsigned();
            $table->foreign('meter_id')->references('id')
                ->on('meters')->onDelete('cascade');

            $table->integer('lot_id')->unsigned();
            $table->foreign('lot_id')->references('lot_id')
                ->on('lots')->onDelete('cascade');

            $table->string('reading_number')->nullable();
            $table->date('reading_date')->nullable();
            $table->float('last_reading')->nullable();
            $table->timestamps();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meter_reading');
    }
}
