<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecSteelPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_steel_points')->truncate();
        DB::table('p_large_spec_steel_points')->insert([
            [
                'name' => '配管・架台',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タンク外面',
                'created_at' => $now,
                'updated_at' => $now
                        ],
            [
                'name' => 'タンク内面',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タンク天蓋',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '屋根（金属）',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '屋根（スレート）',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鋼製煙突',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐熱部',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '亜鉛めっき面',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '非鉄金属アルミ・ステンレス',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'プラント機器類',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'クレーンアンローダー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '海洋構造物',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '水利設備',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '建築鉄骨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鉄塔',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'コンクリート部外面',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '循環水管',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鋼構造物全般',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '屋内鉄骨',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
