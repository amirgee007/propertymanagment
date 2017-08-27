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
            $table->increments('id');

            $table->integer('meter_assignment_id')->unsigned();
            $table->foreign('meter_assignment_id')->references('id')
                ->on('meter_assignments')->onDelete('cascade');

            $table->integer('meter_type_id')->unsigned();
            $table->foreign('meter_type_id')->references('id')
                ->on('meter_types')->onDelete('cascade');

            $table->integer('lot_id')->unsigned();
            $table->foreign('lot_id')->references('lot_id')
                ->on('lots')->onDelete('cascade');

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
        Schema::drop('meters');
    }
}
