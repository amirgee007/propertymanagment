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
            $table->string('lot_name');
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
