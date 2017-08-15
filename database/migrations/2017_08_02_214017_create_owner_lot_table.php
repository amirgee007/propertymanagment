<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_lots', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('lot_id')->nullable();
            $table->integer('lot_type_id')->nullable();
            $table->integer('lot_owner_id')->unsigned();
            $table->foreign('lot_owner_id')->references('owner_id')->on('owners')->onDelete('cascade');
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
