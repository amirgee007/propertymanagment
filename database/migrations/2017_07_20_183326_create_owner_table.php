<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('owner_id');
            $table->integer('company_id');
            $table->string('owner_type');
            $table->string('owner_id_card_no');
            $table->string('owner_name');
            $table->string('owner_dob');
            $table->string('owner_gender');
            $table->string('owner_address');
            $table->string('owner_phone1');
            $table->string('owner_phone2');
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
        Schema::drop('owners');
    }
}
