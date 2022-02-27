<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->integer('building_type')->nullable()->comment('建物種別');
            $table->string('name', 255)->comment('名前');
            $table->string('zip', 255)->nullable()->comment('郵便番号');
            $table->integer('pref_id')->nullable()->comment('都道府県ID');
            $table->string('city', 255)->nullable()->comment('市区町村');
            $table->string('block', 255)->nullable()->comment('番地');
            $table->string('building', 255)->nullable()->comment('ビル名・建物名');
            $table->string('tel', 255)->nullable()->comment('TEL');
            $table->string('fax', 255)->nullable()->comment('FAX');
            $table->string('googlemap', 255)->nullable()->comment('GoogleMap');
            $table->text('remark')->nullable()->comment('備考');
            $table->integer('status')->default(3)->comment('公開ステータス');
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
        Schema::dropIfExists('networks');
    }
}
