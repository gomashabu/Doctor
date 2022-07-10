<?php

use Illuminate\Database\Seeder;

class GoodPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_points')->insert([
            [
            'id' => '1',
            'point' => '美味しい御飯',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'point' => '景色が綺麗',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            'point' => 'デート',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '4',
            'point' => '屋内',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '5',
            'point' => '屋外',
            'created_at' => now(),
            'updated_at' => now(),
                ]
            ]);
    }
}
