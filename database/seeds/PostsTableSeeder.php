<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
            'id' => '1',
            'title' => '美ら海水族館',
            'body' => '沖縄の海 - 豊かな自然や歴史文化の体験をはじめ、イルカたちとのふれあいも楽しめる海洋博公園。
            「沖縄美ら海水族館」は、海洋博公園にある人気スポットの一つです。
            何度訪れても新しい出会いと発見がある「沖縄美ら海水族館」へ、みなさまのご来館をお待ちしております。',
            'lat' => '26.694338',
            'lng' => '127.8780131',
            'area_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'title' => '清水公園',
            'body' => 'スリルと興奮がいっぱい!!　その合計のポイント数は100。
思いっきり遊びながら自分の力を試してみましょう。',
            'lat' => '35.9596938',
            'lng' => '139.8505971',
            'area_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
                ],
            ]);
    }
}
