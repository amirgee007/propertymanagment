<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxTypeForeignIdInInvoiceSettingsTable extends Migration
{
    protected $tables = [ 'invoicing_setting_maintenance_service', 'invoicing_setting_utility'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $table){
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('tax_type');
                $table->integer('tax_type_id')->unsigned()->nullable()->after('user_id');
                $table->foreign('tax_type_id')->references('id')->on('tax_types')->onDelete('SET NULL');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $table){
            Schema::table($table, function (Blueprint $table) {
                $table->string('tax_type')->nullable()->after('billing_ending');
                $table->dropForeign(['tax_type_id']);
                $table->dropColumn('tax_type_id');
            });
        }
    }
}
