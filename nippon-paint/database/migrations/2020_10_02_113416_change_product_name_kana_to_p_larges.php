<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductNameKanaToPLarges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_larges', function (Blueprint $table) {
            $table->string('product_name_kana')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_larges', function (Blueprint $table) {
            $table->string('product_name_kana')->change(); //NOT NULLに戻そうとするとrollback時にどうしてもエラーが出るのでこのまま
        });
    }
}
