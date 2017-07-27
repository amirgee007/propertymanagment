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
//        lot type table
//lot_type_id
//lot_type_name
//lot_type_description
//lot_type_code (max. 2 characters)
//lot_type_size (square feet - will be used when calculate maintenance fee, lot type size X amount per sqf, eg. monthly maintenance fee = 1400 sqf x 0.18 per sqf)
//lot_type_qty (number of units for each lot type)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
