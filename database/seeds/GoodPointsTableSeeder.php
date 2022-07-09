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
            // 'post_id' => '1',    // 'post_id' は、中間テーブルを作成して不要になったため、削除
            'point' => '美味しい御飯',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            // 'post_id' => '2',
            'point' => '景色が綺麗',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            // 'post_id' => '1',
            'point' => 'デート',
            'created_at' => now(),
            'updated_at' => now(),
                ]
            ]);
    }
}
