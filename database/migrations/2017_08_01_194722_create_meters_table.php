<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('meters', function(Blueprint $table)
        {
            $table->increments('meter_id')->index();
            $table->string('meter_type');
            $table->string('number');
            $table->string('lot_no');

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
        Schema::drop('meters');
    }
}
