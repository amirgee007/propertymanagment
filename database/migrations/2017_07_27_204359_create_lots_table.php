<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{

    public function up()
    {
        Schema::create('lots', function(Blueprint $table)
        {
            $table->increments('lot_id');
            $table->integer('lot_type_id')->unsigned();
            $table->foreign('lot_type_id')->references('lot_type_id')->on('lot_types')->onDelete('cascade');
            $table->string('lot_name')->nullable();
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
        Schema::drop('lots');
    }
}
