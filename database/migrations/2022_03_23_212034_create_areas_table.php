<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2022_03_23_212220_add_category_id_to_posts_table.php
        Schema::table('posts', function (Blueprint $table) {
            // $table->integer('category_id')->unsigned(); //カテゴリーidの追加  // area_idをcreateのファイルに追記したため、ここは削除した
=======
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50); //カテゴリー名
            $table->timestamps();
>>>>>>> 2b839ec4cec5d6eb643a7f3b3955e2b2a8c5620d:database/migrations/2022_03_23_212034_create_areas_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
