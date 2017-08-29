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

        Schema::create('meter_rate', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('meter_type_id')->unsigned();
            $table->foreign('meter_type_id')->references('id')
                ->on('meter_types')->onDelete('cascade');

            $table->string('meter_number')->nullable();
            $table->integer('from');
            $table->integer('to');
            $table->float('rate');
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
        Schema::drop('meter_rate');
    }
}
