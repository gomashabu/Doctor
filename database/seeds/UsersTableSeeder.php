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
            [
            'id' => '2',
            'name' => '工藤静香',
            'email' => 'Shizuka@gmail.com',
            'login_id' => '1001',
            'password' => bcrypt('Shizuka'),
            'host_flg' => '0',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
