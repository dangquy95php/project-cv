<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_systems')->truncate();
        DB::table('p_large_systems')->insert([
            [
                'name' => '前処理塗料',
                'slug' => 'preprocessing',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '油性・フタル酸系一般さび止め塗料',
                'slug' => 'oil-phthalic-acid-type-rust-preventive',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '特殊さび止め塗料',
                'slug' => 'special-rust-preventive',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシ系さび止め塗料',
                'slug' => 'epoxy-rust-preventive',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フタル酸(アルキド)樹脂塗料(中・上塗り)',
                'slug' => 'phthalic-acid-resin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '下・上兼用塗料',
                'slug' => 'both-lower-upper',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'M.I.O塗料',
                'slug' => 'mio',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フェノール樹脂塗料',
                'slug' => 'phenolic-resin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塩化ゴム系塗料',
                'slug' => 'chlorinated-rubber',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '変性エポキシ樹脂塗料(下塗り)',
                'slug' => 'modified-epoxy-resin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシ樹脂塗料(下・中・上塗り)',
                'slug' => 'epoxy-resin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'コールタールフリー塗料',
                'slug' => 'coal-tar-free',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウレタン樹脂塗料(中・上塗り)',
                'slug' => 'urethane-resin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ふっ素樹脂塗料(中・上塗り)',
                'slug' => 'fluororesin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ガラスフレーク塗料',
                'slug' => 'glass-flakes',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '屋根用塗料',
                'slug' => 'roof',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '海水導入管用防汚塗料',
                'slug' => 'antifouling-seawater-introduction-pipe',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐熱塗料',
                'slug' => 'thermostable',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シンナー',
                'slug' => 'thinner',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '橋梁用塗料(防食便覧など)',
                'slug' => 'bridges',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'コンクリート防食システム',
                'slug' => 'concrete-anticorrosion-system',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '落書き・張り紙防止塗料',
                'slug' => 'prevent-graffiti-posters',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '水性防食塗料',
                'slug' => 'aqueous-corrosion-protection',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐火塗料',
                'slug' => 'fireproof',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鉄塔用塗料',
                'slug' => 'steel-tower',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
