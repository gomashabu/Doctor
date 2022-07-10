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
        DB::table('users')->insert([
            [
            'id' => '1',
            'name' => '木村拓哉',
            'email' => 'Takuya@gmail.com',
            'login_id' => '1000',
            'password' => bcrypt('password'),
            'host_flg' => '1',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
