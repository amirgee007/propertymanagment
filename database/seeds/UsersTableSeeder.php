<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $datas = array(
            array(
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => bcrypt('password'),
                'role_id' => 1
            ), array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'role_id' => 2
            ),array(
                'name' => 'Manager',
                'email' => 'manager@admin.com',
                'password' => bcrypt('password'),
                'role_id' => 3
            ),array(
                'name' => 'Staff',
                'email' => 'staff@admin.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ),array(
                'name' => 'Owner',
                'email' => 'owner@admin.com',
                'password' => bcrypt('password'),
                'role_id' => 5
            ),
        );

        foreach ($datas as $data) {
            DB::table('users')->insert($data);
        }
    }

}
