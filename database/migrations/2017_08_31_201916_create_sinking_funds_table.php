<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinkingFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinking_funds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lot_id')->unsigned();
            $table->foreign('lot_id')->references('lot_id')->on('lots')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->decimal('amount')->default(0);
            $table->integer('gst')->nullable();
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
        Schema::dropIfExists('sinking_funds');
    }
}
