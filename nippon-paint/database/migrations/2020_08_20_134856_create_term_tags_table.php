<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * タグマスタ
         */
        Schema::create('term_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('タグ名');
            $table->string('slug', 200)->comment('スラッグ');
            $table->timestamps();
        });
        /**
         * 用語集-タグ中間テーブル
         */
        Schema::create('technical_term_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('technical_term_id')->comment('用語ID');
            $table->integer('term_tag_id')->comment('タグID');
            $table->timestamps();
            // 複合インデックス設定
            $table->index(['technical_term_id', 'term_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_tags');
        Schema::dropIfExists('technical_term_tags');
    }
}
