<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeStandardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_standards')->truncate();
        DB::table('p_large_standards')->insert([
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('日本道路協会（塩害対策指針）（昭和59年2月）', "ask"),
                'slug' => 'jara-engai_s59_2',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('日本道路協会（便覧）（平成26年3月）', "ask"),
                'slug' => 'jara-binran_h26_3',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('NEXCO（東日本・中日本・西日本）高速道路㈱（令和2年7月）', "ask"),
                'slug' => 'nexco_r2_7',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('首都高速道路㈱（剥落）（平成26年8月）', "ask"),
                'slug' => 'shutoko-hakuraku_h26_8',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('首都高速道路㈱（SDK）（平成29年8月）', "ask"),
                'slug' => 'shutoko-sdk_h29_8',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('首都高速道路㈱（SDK)（2019年7月）', "ask"),
                'slug' => 'shutoko-sdk_2019_7',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('名古屋高速道路公社（NES)（平成22年1月）', "ask"),
                'slug' => 'nes_h22_1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('阪神高速道路㈱（HDK)（平成29年及び平成30年）', "ask"),
                'slug' => 'hdk_h29-h30',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('福岡北九州高速道路公社（FKD）（平成25年及び平成27年）', "ask"),
                'slug' => 'fkd_h25-h27',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('本州四国連絡高速道路㈱（HBS)（令和元年10月）', "ask"),
                'slug' => 'hbs_r1_10',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('鉄道総合技術研究所（SPS)（2013年12月）', "ask"),
                'slug' => 'sps_2013_12',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'p_large_standard_category_id' => '1',
                'standard_name' => mb_convert_kana('国土交通省（機械工事塗装要領（案）・同解説）（平成22年4月）', "ask"),
                'slug' => 'mlit-kikai_h22_4',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
