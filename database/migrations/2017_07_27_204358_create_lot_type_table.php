<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('lot_types', function(Blueprint $table)
        {
            $table->increments('lot_type_id');
            $table->integer('lot_id')->nullable();
            $table->string('lot_type_name')->unique();
            $table->string('lot_type_description');
            $table->float('lot_type_size')->nullable();
            $table->integer('lot_type_qty')->nullable();
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
        Schema::drop('lot_types');
    }
}
