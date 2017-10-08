<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChargingRateFieldInConfigLotTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_lot_type', function (Blueprint $table) {
            $table->decimal('charging_rate')->nullable()->after('fee_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_lot_type', function (Blueprint $table) {
            $table->dropColumn('charging_rate');
        });
    }
}
