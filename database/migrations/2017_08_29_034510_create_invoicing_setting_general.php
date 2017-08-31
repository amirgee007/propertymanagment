<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicingSettingGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicing_setting_general', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('invoice_creation_day')->nullable();
            $table->integer('invoice_due_date')->nullable();
            $table->string('interest_rate')->nullable();
            $table->timestamps();
        });
        Schema::create('invoicing_setting_utility', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('invoice_repeat_month')->nullable();
            $table->date('billing_start_date')->nullable();
            $table->enum('billing_ending',['never','on_specific_date','after_number_of_billing'])
                ->comment('never = Never, on_specific_date = On specific date excuse,after_number_of_billing=After number of billing')->default('never');
            $table->string('tax_type')->nullable();

            $table->timestamps();
        });
        Schema::create('invoicing_setting_maintenance_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('invoice_repeat_month')->nullable();
            $table->enum('fee_charged',['property_size','total_amount'])->nullable();
            $table->integer('charges_per_sqft')->nullable();
            $table->enum('billing_ending',['never','on_specific_date','after_number_of_billing'])
                ->nullable();
            $table->string('tax_type')->nullable();

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
        Schema::dropIfExists('invoicing_setting_general');
        Schema::dropIfExists('invoicing_setting_utility');
        Schema::dropIfExists('invoicing_setting_maintenance_service');
    }
}
