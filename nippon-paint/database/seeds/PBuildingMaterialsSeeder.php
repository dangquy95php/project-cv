<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingMaterialsSeeder extends Seeder
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
        DB::table('p_building_materials')->truncate();
        DB::table('p_building_materials')->insert([
            [
                'name' => 'モルタル',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'コンクリート',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '石膏ボード',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '押出成形セメント板',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'サイディングボード',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '磁器タイル',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ブロック',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'PC板',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'けい酸カルシウム板',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'スレート',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ALC',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'GRC',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '硬質塩ビ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塩ビゾル鋼板',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '木部',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鉄',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ステンレス',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '溶融亜鉛めっき',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'クロメート処理亜鉛めっき',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アルミ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アルミアルマイト',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'FRP',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
