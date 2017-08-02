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
            $table->increments('meter_rate_id')->index();
            $table->string('meter_number');
            $table->float('from');
            $table->float('to');
            $table->float('rate');

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
        Schema::drop('meter_rate');
    }
}
