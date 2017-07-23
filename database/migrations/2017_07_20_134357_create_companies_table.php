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
            $table->integer('owner_id');
            $table->string('comp_name');
            $table->string('comp_address')->nullable();
            $table->string('comp_reg_no')->nullable();
            $table->string('comp_telephone_no')->nullable();
            $table->string('comp_fax_no')->nullable();
            $table->string('comp_contact_person')->nullable();
            $table->string('comp_contact_no')->nullable();
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
