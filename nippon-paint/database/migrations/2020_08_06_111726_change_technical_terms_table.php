<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTechnicalTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technical_terms', function (Blueprint $table) {
            $table->string('title_kana')->after('title')->index();
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technical_terms', function (Blueprint $table) {
            $table->dropColumn('title_kana');
            $table->dropIndex(['title']);
        });
    }
}
