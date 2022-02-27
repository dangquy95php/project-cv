<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TermTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('term_tags')->truncate();
        DB::table('term_tags')->insert([
            [
                'name' => 'フッ素',
                'slug' => 'a02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シリコン',
                'slug' => 'a03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウレタン',
                'slug' => 'a04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アクリル',
                'slug' => 'a05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシ',
                'slug' => 'a06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フタル酸',
                'slug' => 'a07',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アルキッド',
                'slug' => 'a08',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '合成樹脂調合ペイント',
                'slug' => 'a09',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '硬化剤',
                'slug' => 'a10',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハードナー',
                'slug' => 'a11',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アクリル樹脂エマルション塗料',
                'slug' => 'a12',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'つや有り合成樹脂エマルション塗料',
                'slug' => 'a13',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '合成樹脂エマルション塗料',
                'slug' => 'a14',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '合成樹脂エマルションペイント',
                'slug' => 'a15',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アクリル樹脂エマルションペイント',
                'slug' => 'a16',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5663',
                'slug' => 'a17',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '１液ファインウレタンU100',
                'slug' => 'a18',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '無機系塗料',
                'slug' => 'a19',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フッ素樹脂系塗料',
                'slug' => 'a20',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シリコン樹脂系塗料',
                'slug' => 'a21',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ラジカル制御型塗料',
                'slug' => 'a22',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウレタン樹脂系塗料',
                'slug' => 'a23',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アクリル樹脂塗系料',
                'slug' => 'a24',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アクリル樹脂系塗料',
                'slug' => 'a25',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ラッカーエナメル',
                'slug' => 'a26',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '変性エポキシ',
                'slug' => 'a27',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タールエポキシ',
                'slug' => 'a28',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '水道水',
                'slug' => 'a29',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塗料用シンナー',
                'slug' => 'a30',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '専用シンナー',
                'slug' => 'a31',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フッ素樹脂塗料',
                'slug' => 'a32',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シリコン樹脂塗料',
                'slug' => 'a33',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウレタン樹脂塗料',
                'slug' => 'a34',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '反応硬化',
                'slug' => 'a35',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '２液',
                'slug' => 'a36',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシ樹脂',
                'slug' => 'a37',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鉛・クロムフリー',
                'slug' => 'a38',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'つや有り合成樹脂エマルション',
                'slug' => 'a39',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '有光沢エマルション',
                'slug' => 'a40',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エマルションシーラー',
                'slug' => 'a41',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシシーラー',
                'slug' => 'a42',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シミ止めシーラー',
                'slug' => 'a43',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シーラー',
                'slug' => 'a44',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'プライマー',
                'slug' => 'a45',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'さび止め塗料',
                'slug' => 'a46',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ターペン可溶',
                'slug' => 'a47',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '高日射反射率塗料',
                'slug' => 'a48',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アクリルシリコン樹脂塗料',
                'slug' => 'a49',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シリコーンアクリル樹脂塗料',
                'slug' => 'a50',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '弱溶剤',
                'slug' => 'a51',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ターペン',
                'slug' => 'a52',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '微弾性',
                'slug' => 'a53',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '弾性',
                'slug' => 'a54',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '高弾性',
                'slug' => 'a55',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '有光沢合成樹脂エマルション',
                'slug' => 'a56',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'EP',
                'slug' => 'a57',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'EP-G',
                'slug' => 'a58',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'GP',
                'slug' => 'a59',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '親水性',
                'slug' => 'a60',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '専用中塗り塗料',
                'slug' => 'a61',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシ樹脂系中塗り塗料',
                'slug' => 'a62',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウレタン樹脂系中塗り塗料',
                'slug' => 'a63',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '電気亜鉛めっき',
                'slug' => 'b02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ボンデ鋼板',
                'slug' => 'b03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '溶融亜鉛めっき',
                'slug' => 'b04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ドブ漬け亜鉛めっき',
                'slug' => 'b05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '軽量気泡コンクリート',
                'slug' => 'b06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アンダーフィラーS',
                'slug' => 'b07',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塩ビゾルウレタンプライマー',
                'slug' => 'b08',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '住宅用化粧スレート屋根',
                'slug' => 'b09',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'かぶり',
                'slug' => 'c02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '白化',
                'slug' => 'c03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '雨ダレ',
                'slug' => 'c04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '隠ぺい性',
                'slug' => 'c05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'むら',
                'slug' => 'c06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'べたつき',
                'slug' => 'c07',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塗料用シンナー',
                'slug' => 'd02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ペイントシンナー',
                'slug' => 'd03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ペイントうすめ液',
                'slug' => 'd04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ラッカーシンナー',
                'slug' => 'd05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ラッカー用うすめ液',
                'slug' => 'd06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '専用シンナー',
                'slug' => 'd07',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '日本産業規格',
                'slug' => 'e02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS A',
                'slug' => 'e03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K',
                'slug' => 'e04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '親水',
                'slug' => 'f02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シーリング材',
                'slug' => 'f03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塩ビゾル鋼板',
                'slug' => 'f04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ブリードオフプライマー',
                'slug' => 'f05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塩ビゾルウレタンプライマー',
                'slug' => 'f06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'スプレー',
                'slug' => 'g02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エアレススプレー',
                'slug' => 'g03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '住宅用化粧スレート屋根',
                'slug' => 'g04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '素地調整',
                'slug' => 'g05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '下地調整',
                'slug' => 'g06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ケレン',
                'slug' => 'g07',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '素地調整',
                'slug' => 'g08',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '素地ごしらえ',
                'slug' => 'g09',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '下地ごしらえ',
                'slug' => 'g10',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '高圧洗浄',
                'slug' => 'g11',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ひび割れ補修',
                'slug' => 'g12',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '色あわせ',
                'slug' => 'g13',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'つや有り',
                'slug' => 'g14',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '７分つや有り',
                'slug' => 'g15',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '５分つや有り',
                'slug' => 'g16',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '３分つや有り',
                'slug' => 'g17',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'つや消し',
                'slug' => 'g18',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '遮熱塗料',
                'slug' => 'h02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'サーモアイシリーズ',
                'slug' => 'h03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'パーフェクトクーラーベスト',
                'slug' => 'h04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ローラー',
                'slug' => 'l02',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '短毛ローラー',
                'slug' => 'l03',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '中毛ローラー',
                'slug' => 'l04',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '長毛ローラー',
                'slug' => 'l05',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '砂骨ローラー',
                'slug' => 'l06',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '多孔質ローラー',
                'slug' => 'l07',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'マスチックローラー',
                'slug' => 'l08',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シーリング',
                'slug' => 'l09',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'コーキング',
                'slug' => 'l10',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シール',
                'slug' => 'l11',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
