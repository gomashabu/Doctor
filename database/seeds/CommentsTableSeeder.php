<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
            'id' => '1',
            'comment' => 'おいしいご飯',
            'post_id' => '1',
            'user_id' => '1',
            'good' => '3',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'id' => '2',
            'comment' => '美しい',
            'post_id' => '1',
            'user_id' => '1',
            'good' => '1',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'id' => '3',
            'comment' => '自然いっぱい',
            'post_id' => '2',
            'user_id' => '1',
            'good' => '5',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'id' => '4',
            'comment' => '行かない方が良い',
            'post_id' => '2',
            'user_id' => '1',
            'good' => '1',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ]);
    }
}
