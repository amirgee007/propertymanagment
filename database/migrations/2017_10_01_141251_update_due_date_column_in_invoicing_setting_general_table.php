<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDueDateColumnInInvoicingSettingGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoicing_setting_general', function (Blueprint $table) {
            $table->date('invoice_due_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoicing_setting_general', function (Blueprint $table) {
            $table->integer('invoice_due_date')->change();
        });
    }
}
