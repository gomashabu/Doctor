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
            'area_id' => '8',
            'lat' => '26.694338',
            'lng' => '127.8780131',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'title' => '清水公園',
            'body' => 'スリルと興奮がいっぱい!!　その合計のポイント数は100。
思いっきり遊びながら自分の力を試してみましょう。',
            'area_id' => '3',
            'lat' => '26.694338',
            'lng' => '127.8780131',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            'title' => '東京ディズニーリゾート',
            'body' => '「東京ディズニーランド」「東京ディズニーシー」という異なるテーマを持った２つのディズニーテーマパークと、３つのディズニーブランドホテル、提携のオフィシャルホテル、複合型商業施設「イクスピアリ」、リゾート内の移動に便利なモノレールなどで構成された、一大テーマリゾートです。パークで遊ぶことに留まらず、滞在することでショッピングや食事など様々な楽しみ方ができるリゾート体験をご提供しています。',
            'area_id' => '3',
            'lat' => '26.694338',
            'lng' => '127.8780131',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '4',
            'title' => '横浜赤レンガ倉庫',
            'body' => '屋外のイベント広場では、各種イベントを通常通り開催いたします。四季折々の多彩なイベントをご堪能ください！イベント情報は、当ホームページや横浜赤レンガ倉庫公式SNSで随時情報更新中。',
            'area_id' => '3',
            'lat' => '26.694338',
            'lng' => '127.8780131',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '5',
            'title' => '梅田スカイビル空中庭園展望台',
            'body' => '新梅田シティにお越しいただいたら、まずは梅田スカイビルの造形美を楽しんで。
スペインのサグラダファミリアやギリシャのパルテノン神殿、インドのタージマハル・・・
錚々たる歴史的建造物とともに、イギリスで「スリルに満ちた高層ビル」として「世界の建築トップ20」に選出された梅田スカイビルを、まずは建築物としてお楽しみください。',
            'area_id' => '5',
            'lat' => '35.9596938',
            'lng' => '139.8505971',
            'created_at' => now(),
            'updated_at' => now(),
                ],
            ]);
    }
}
