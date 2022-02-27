<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAutomotivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_automotives', function (Blueprint $table) {
            $table->id();
            $table->string('nks_no')->nullable()->comment('NKS製品番号');
            $table->integer('nks_ver_no')->nullable()->index()->comment('NKS製品版番');
            $table->integer('status')->comment('公開ステータス');
            $table->integer('p_automotive_subcategory_id')->nullable()->index()->comment('製品カテゴリ');
            $table->string('product_name')->index()->comment('製品名');
            $table->string('product_name_kana')->index()->nullable()->comment('製品名カナ');
            $table->string('logo')->nullable()->comment('製品ロゴ');
            $table->string('image')->nullable()->comment('製品イメージ');
            $table->string('labels')->nullable()->comment('ラベル');
            $table->text('description')->nullable()->comment('製品説明');
            $table->text('feature')->nullable()->comment('特長');
            $table->integer('classification')->nullable()->comment('製品分類');
            $table->integer('base_id')->nullable()->comment('水性/溶剤');
            $table->integer('pack_type_id')->nullable()->comment('1液/2液');
            $table->string('regulations')->nullable()->comment('法令');
            $table->string('fire_laws_classifications')->nullable()->comment('消防法区分');
            $table->integer('hardener_ratio')->nullable()->comment('硬化剤比率');
            $table->text('hardener_ratio_supplement')->nullable()->comment('硬化剤比率（補足）');
            $table->text('content')->nullable()->comment('容量');
            $table->text('color')->nullable()->comment('色相');
            $table->text('mixing_ratio')->nullable()->comment('混合比率・シンナー希釈率');
            $table->text('applicable_material')->nullable()->comment('適応素材');
            $table->string('applicable_clear_paints')->nullable()->comment('適応クリヤー');
            $table->text('mixing_ratio_table')->nullable()->comment('混合比');
            $table->text('drying_time')->nullable()->comment('乾燥時間');
            $table->text('pot_life')->nullable()->comment('ポットライフ');
            $table->text('resin_specs')->nullable()->comment('樹脂仕様');
            $table->text('free_area')->nullable()->comment('自由入力');
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
        Schema::dropIfExists('p_automotives');
    }
}
