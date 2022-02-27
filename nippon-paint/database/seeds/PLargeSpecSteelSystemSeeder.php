<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecSteelSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_steel_systems')->truncate();
        DB::table('p_large_spec_steel_systems')->insert([
            [
                'name' => '前処理塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '油性・フタル酸系一般さび止め塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '特殊さび止め塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'エポキシ系さび止め塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'フタル酸(アルキド)樹脂塗料(中・上塗り)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '下・上兼用塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'M.I.O塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'フェノール樹脂塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '塩化ゴム系塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '変性エポキシ樹脂塗料(下塗り)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'エポキシ樹脂塗料(下・中・上塗り)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'コールタールフリー塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'ウレタン樹脂塗料(中・上塗り)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'ふっ素樹脂塗料(中・上塗り)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'ガラスフレーク塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '屋根用塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '海水導入管用防汚塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '耐熱塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'シンナー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '橋梁用塗料(防食便覧など)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'コンクリート防食システム',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '落書き・張り紙防止塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '水性防食塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '耐火塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '鉄塔用塗料',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
