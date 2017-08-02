<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('car_parks', function(Blueprint $table)
        {
            $table->increments('car_park_id')->index();
            $table->string('number');

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
        Schema::drop('car_parks');
    }
}
