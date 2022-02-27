<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNippelabArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nippelab_articles', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(3)->comment('公開ステータス');
            $table->timestamp('publication_date')->nullable()->comment('公開日時');
            $table->integer('theme_id')->nullable()->comment('テーマID');
            $table->integer('category_id')->nullable()->comment('カテゴリーID');
            $table->string('title', 255)->comment('タイトル');
            $table->string('slug', 255)->nullable()->unique()->comment('スラッグ');
            $table->text('meta_description')->nullable()->comment('メタディスクリプション');
            $table->text('og_description')->nullable()->comment('OGPディスクリプション');
            $table->string('og_image', 255)->nullable()->comment('OGP画像');
            $table->text('body')->nullable()->comment('本文');
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
        Schema::dropIfExists('nippelab_articles');
    }
}
