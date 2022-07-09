<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_points', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('post_id');  // 中間テーブルを作ったため、削除 (good_point_post_table内にpost_idとgood_point_idのリンクを記載)
            $table->string('point', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_points');
    }
}
