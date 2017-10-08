<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsTaxableFieldInMeterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meter_types', function (Blueprint $table) {
            $table->boolean('is_taxable')->default(0)->after('minimum_charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meter_types', function (Blueprint $table) {
            $table->dropColumn('is_taxable');
        });
    }
}
