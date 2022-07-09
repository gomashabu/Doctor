<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodPointPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_point_post', function (Blueprint $table) {
            // good_point_idとpost_idを外部キーに設定する
            $table->integer('good_point_id')->unsigned();    //students,subjectsテーブルのidが
            $table->integer('post_id')->unsigned();    //bigIncrementであった場合はbigIntegerにする
            $table->primary(['good_point_id', 'post_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_point_post');
    }
}
