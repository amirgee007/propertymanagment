<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $datas = array(
            array('name' => 'Super Admin'),
            array('name' => 'Admin'),
            array('name' => 'Manager'),
            array('name' => 'Staff'),
            array('name' => 'Owner'),
        );

        foreach ($datas as $data) {
            DB::table('roles')->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');

    }
}
