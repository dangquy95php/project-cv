<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveCharacteristicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('p_automotive_characteristics')->truncate();
        DB::table('p_automotive_characteristics')->insert([
            [
                'name' => '特化則対象外',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'PRTR法届出対象外',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '低VOC',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '艶消し',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐スリ傷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '架装向け',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '有機則対象外',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
