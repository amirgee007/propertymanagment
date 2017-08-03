<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeterTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('meter_types', function(Blueprint $table)
        {
            $table->increments('meter_types_id');
            $table->integer('meter_id');
            $table->string('meter_name');
            $table->string('meter_code');
            $table->float('minimum_charges');
            $table->float('tax_amount');
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
        Schema::drop('meter_types');
    }
}
