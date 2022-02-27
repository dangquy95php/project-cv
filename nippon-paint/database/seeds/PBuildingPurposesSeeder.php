<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingPurposesSeeder extends Seeder
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
        DB::table('p_building_purposes')->truncate();
        DB::table('p_building_purposes')->insert([
            [
                'name' => 'TVOC 1%未満',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '防火認定',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '防藻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '防かび',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '抗菌',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '抗ウイルス',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ホルムアルデヒド吸着',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '低臭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '汚染除去性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ヤニ止め',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '弾性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '省工程',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '厚膜',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アスベスト飛散',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '高耐候性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '遮熱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '省エネ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '低汚染',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '手垢汚れ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '皮脂軟化',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '透湿性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '節電塗料',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
