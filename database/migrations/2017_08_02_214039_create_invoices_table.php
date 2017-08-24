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
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('owner_id')->on('owners')->onDelete('cascade');
            $table->integer('lot_id')->unsigned();
            $table->foreign('lot_id')->references('lot_id')->on('lots')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->text('invoice_trans_des');
            $table->integer('invoice_quantity');
            $table->string('invoice_uom');
            $table->integer('invoice_charge_rate');
            $table->integer('invoice_amount');
            $table->string('invoice_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
