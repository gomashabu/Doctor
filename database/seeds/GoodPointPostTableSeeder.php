<?php

use Illuminate\Database\Seeder;

class GoodPointPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_point_post')->insert([
            [
            'good_point_id' => '1',
            'post_id' => '3',
                ],
                [
            'good_point_id' => '1',
            'post_id' => '4',
                ],
                [
            'good_point_id' => '2',
            'post_id' => '2',
                ],
                [
            'good_point_id' => '2',
            'post_id' => '3',
                ],
                [
            'good_point_id' => '2',
            'post_id' => '4',
                ],
                [
            'good_point_id' => '2',
            'post_id' => '5',
                ],
                [
            'good_point_id' => '3',
            'post_id' => '1',
                ],
                [
            'good_point_id' => '3',
            'post_id' => '2',
                ],
                [
            'good_point_id' => '3',
            'post_id' => '3',
                ],
                [
            'good_point_id' => '3',
            'post_id' => '4',
                ],
                [
            'good_point_id' => '3',
            'post_id' => '5',
                ],
                [
            'good_point_id' => '4',
            'post_id' => '1',
                ],
                [
            'good_point_id' => '4',
            'post_id' => '4',
                ],
                [
            'good_point_id' => '4',
            'post_id' => '5',
                ],
                [
            'good_point_id' => '5',
            'post_id' => '2',
                ],
                [
            'good_point_id' => '5',
            'post_id' => '3',
                ]
            ]);
    }
}
