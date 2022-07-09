<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
            'id' => '1',
            'name' => '北海道',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'name' => '東北',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            'name' => '関東',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '4',
            'name' => '中部',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '5',
            'name' => '中部',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '6',
            'name' => '近畿',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '7',
            'name' => '中国',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '8',
            'name' => '四国',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '9',
            'name' => '九州',
            'created_at' => now(),
            'updated_at' => now(),
                ],
            ]);
    }
}
