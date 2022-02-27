<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingPaintingMethodsSeeder extends Seeder
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
        DB::table('p_building_painting_methods')->truncate();
        DB::table('p_building_painting_methods')->insert([
            [
                'name' => 'はけ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '硬質はけ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エアレススプレー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エアスプレー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '吹付け',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'リシンガン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タイルガン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'スタッコガン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '万能ガン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '短毛ローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '中毛ローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '長毛ローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウールローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '砂骨ローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '砂骨ローラー（細目）',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '砂骨ローラー（標準目）',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ローラー（多孔質）はけ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '専用ローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'マスチックローラー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '金こて',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'こて',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'へら',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'こてばけ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '硬質ヘラ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '目地はけ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウエス',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'モップ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '専用塗装機',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウェットハンド',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '浸漬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '高塗着',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '特殊エアレス',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
