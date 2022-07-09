<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(GoodPointsTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
