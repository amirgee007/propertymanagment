<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('comp_id');
            $table->string('comp_name');
            $table->string('comp_address');
            $table->string('comp_reg_no');
            $table->string('comp_telephone_no');
            $table->string('comp_fax_no');
            $table->string('comp_contact_person');
            $table->string('comp_contact_no');
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
        Schema::drop('companies');
    }
}
