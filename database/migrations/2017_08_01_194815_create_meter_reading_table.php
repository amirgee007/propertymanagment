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
            $table->increments('lot_type_id')->index();
            $table->string('number');
            $table->integer('meter_id');
            $table->integer('lot_no');

            $table->timestamp('last_reading_date')->nullable();
            $table->float('last_reading')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

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
