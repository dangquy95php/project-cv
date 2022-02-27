<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecBridgeRegulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_bridge_regulations')->truncate();
        DB::table('p_large_spec_bridge_regulations')->insert([
            [
                'name' => '日本道路協会（塩害対策指針）（昭和59年2月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '日本道路協会（便覧）（平成26年3月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'NEXCO（東日本・中日本・西日本）高速道路㈱（令和2年7月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '首都高速道路㈱（剥落）（平成26年8月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '首都高速道路㈱（SDK）（平成29年8月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '首都高速道路㈱（SDK)（2019年7月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '名古屋高速道路公社（NES)（平成22年1月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '阪神高速道路㈱（HDK)（平成29年及び平成30年）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '福岡北九州高速道路公社（FKD）（平成25年及び平成27年）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '本州四国連絡高速道路㈱（HBS)（令和元年10月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鉄道総合技術研究所（SPS)（2013年12月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '国土交通省（機械工事塗装要領（案）・同解説）（平成22年4月）',
                'slug' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
