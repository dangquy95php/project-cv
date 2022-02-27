<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_buildings', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('nks_no')->nullable()->comment('登録日時');
            $table->integer('nks_ver_no')->nullable()->comment('更新日時');
            $table->integer('status')->comment('NKS製品番号');
            $table->integer('p_building_subcategory_id')->nullable()->index()->comment('NKS製品版番');
            $table->string('product_name')->index()->comment('公開ステータス');
            $table->string('product_name_kana')->nullable()->index()->comment('製品カテゴリ');
            $table->string('general_name')->nullable()->comment('製品名');
            $table->string('thumbnail')->nullable()->comment('製品名カナ');
            $table->text('description')->nullable()->comment('サムネイル');
            $table->text('feature')->nullable()->comment('製品説明');
            $table->integer('base_id')->nullable()->comment('製品特長');
            $table->integer('pack_type_id')->nullable()->comment('水性/溶剤');
            $table->integer('use_housing')->nullable()->comment('1液/2液');
            $table->integer('use_condominium')->nullable()->comment('用途＿戸建て住宅');
            $table->integer('use_institution')->nullable()->comment('用途＿マンション');
            $table->integer('use_office')->nullable()->comment('用途＿教育施設・病院');
            $table->integer('use_factory')->nullable()->comment('用途＿オフィス');
            $table->integer('use_steel_structure')->nullable()->comment('用途＿工場倉庫');
            $table->text('use_detail')->nullable()->comment('用途＿鋼構造物');
            $table->text('standard')->nullable()->comment('用途詳細');
            $table->text('applicable_base')->nullable()->comment('規格');
            $table->text('color_exception')->nullable()->comment('適用下地');
            $table->string('lusters')->nullable()->comment('色相補足');
            $table->text('painting_method_exception')->nullable()->comment('つや');
            $table->string('diluents')->nullable()->comment('施工方法補足');
            $table->string('processes')->nullable()->comment('希釈剤');
            $table->string('pot_life')->nullable()->comment('工程');
            $table->text('usage')->nullable()->comment('ポットライフ');
            $table->text('drying_time')->nullable()->comment('使用量');
            $table->text('color_lineup')->nullable()->comment('乾燥時間');
            $table->text('price')->nullable()->comment('カラーラインナップ');
            $table->string('related_information')->nullable()->comment('価格');
            $table->text('free_area')->nullable()->comment('関連情報ページ');
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
        Schema::dropIfExists('p_buildings');
    }
}