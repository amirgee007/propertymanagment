<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->string('invoice_owner_name');
            $table->string('invoice_lot_no');
            $table->date('invoice_date');
            $table->text('invoice_trans_des');
            $table->integer('invoice_quantity');
            $table->string('invoice_uom');
            $table->integer('invoice_charge_rate');
            $table->integer('invoice_amount');
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
        Schema::drop('invoices');
    }
}
