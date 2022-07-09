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
            ]);
    }
}
