<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInInvoiceSettingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoicing_setting_utility', function (Blueprint $table) {
            $table->date('billing_end_date')->nullable();
            $table->string('after_billing_day')->nullable();

        });
        Schema::table('invoicing_setting_maintenance_service', function (Blueprint $table) {
            $table->date('billing_end_date')->nullable();
            $table->string('after_billing_day')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoicing_setting_utility', function (Blueprint $table) {
            $table->dropColumn('billing_end_date');
            $table->dropColumn('after_billing_day');
        });
        Schema::table('invoicing_setting_maintenance_service', function (Blueprint $table) {
            $table->dropColumn('billing_end_date');
            $table->dropColumn('after_billing_day');
        });
    }
}
