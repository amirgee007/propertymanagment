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
            $table->string('lot_name');
            $table->integer('owner_id');
            $table->integer('lot_type_id')->nullable();
            $table->timestamp('created_at');

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
