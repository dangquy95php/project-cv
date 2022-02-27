<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveSubcategoriesSeeder extends Seeder
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
        DB::table('p_automotive_subcategories')->truncate();
        DB::table('p_automotive_subcategories')->insert([
            [
                'id' => 1,
                'category_name' => '上塗り塗料',
                'parent_id' => null,
                'slug' => 'topcoat',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'category_name' => 'クリヤー',
                'parent_id' => null,
                'slug' => 'clear',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'category_name' => 'プラサフ',
                'parent_id' => null,
                'slug' => 'prasaf',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'category_name' => 'パテ',
                'parent_id' => null,
                'slug' => 'putty',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'category_name' => 'プライマー',
                'parent_id' => null,
                'slug' => 'primer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 6,
                'category_name' => '補助剤その他',
                'parent_id' => null,
                'slug' => 'auxiliary-other',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'category_name' => '調色関連商品',
                'parent_id' => null,
                'slug' => 'toning-products',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'category_name' => '塗装関連商品',
                'parent_id' => null,
                'slug' => 'paint-tools',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 1上塗塗装
            [
                'id' => 9,
                'category_name' => '水性カラーベース',
                'parent_id' => 1,
                'slug' => 'aqueous-colorbase',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 10,
                'category_name' => '低VOC溶剤系カラーベース',
                'parent_id' => 1,
                'slug' => 'voc-colorbase',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 11,
                'category_name' => '溶剤系カラーベース',
                'parent_id' => 1,
                'slug' => 'solvent-colorbase',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 12,
                'category_name' => '偏光性塗料（マジョーラ）',
                'parent_id' => 1,
                'slug' => 'majora',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 13,
                'category_name' => 'レアル・アドミラアルファ共用商品',
                'parent_id' => 1,
                'slug' => 'realadmiraalpha-shared',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 14,
                'category_name' => '2液ウレタン塗料',
                'parent_id' => 1,
                'slug' => '2component-urethane',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 15,
                'category_name' => 'ラッカー塗料',
                'parent_id' => 1,
                'slug' => 'lacquer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 16,
                'category_name' => '共通原色',
                'parent_id' => 1,
                'slug' => 'common-primary-color',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 2クリヤー
            [
                'id' => 17,
                'category_name' => '特化則対象外クリヤー（naxマルチエコクリヤーシリーズ）',
                'parent_id' => 2,
                'slug' => 'naxmultieco-series',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 18,
                'category_name' => '速乾・高作業性クリヤー（naxマルチクリヤーシリーズ）',
                'parent_id' => 2,
                'slug' => 'naxmulticlear-series',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 19,
                'category_name' => '機能性クリヤー（naxイージスクリヤーシリーズ）',
                'parent_id' => 2,
                'slug' => 'naxaegisclear-series',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 20,
                'category_name' => '架装車両向けクリヤー',
                'parent_id' => 2,
                'slug' => 'bodywork-vehicles',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 21,
                'category_name' => '工業用クリヤー（naxマイティラックG-Ⅱクリヤーシリーズ）',
                'parent_id' => 2,
                'slug' => 'naxmightyrackg2-series',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 3プラサフ
            [
                'id' => 22,
                'category_name' => 'ウレタンプラサフ（naxウレタンプラサフシリーズ）',
                'parent_id' => 3,
                'slug' => 'naxurethaneprasaf-series',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 23,
                'category_name' => 'ラッカープラサフ（naxプラサフシリーズ）',
                'parent_id' => 3,
                'slug' => 'naxprasaf-series',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 4パテ
            [
                'id' => 24,
                'category_name' => '特化則対応＋超高張力鋼板対応型',
                'parent_id' => 4,
                'slug' => 'specialized-rule-super-high-tensile-steel',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 25,
                'category_name' => '超高張力鋼板対応型',
                'parent_id' => 4,
                'slug' => 'super-high-tensile-steel',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 26,
                'category_name' => '防錆鋼板対応型',
                'parent_id' => 4,
                'slug' => 'anti-corrosion-steel-sheet',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 6補助剤その他
            [
                'id' => 27,
                'category_name' => '添加剤',
                'parent_id' => 6,
                'slug' => 'additive',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 28,
                'category_name' => '塗装面調整剤',
                'parent_id' => 6,
                'slug' => 'painted-surface-conditioner',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 29,
                'category_name' => '仕上げ調整剤',
                'parent_id' => 6,
                'slug' => 'finish-adjuster',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 30,
                'category_name' => '樹脂部品用塗膜軟質剤',
                'parent_id' => 6,
                'slug' => 'coating-film-softener',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 31,
                'category_name' => 'つや消し剤',
                'parent_id' => 6,
                'slug' => 'matting-agent',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 32,
                'category_name' => '洗浄剤',
                'parent_id' => 6,
                'slug' => 'abstergent',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 33,
                'category_name' => 'シャーシー用塗料',
                'parent_id' => 6,
                'slug' => 'chassis',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 34,
                'category_name' => 'サッシュコート用塗料',
                'parent_id' => 6,
                'slug' => 'sash-coat',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 35,
                'category_name' => 'ハードナー',
                'parent_id' => 6,
                'slug' => 'hardener',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 36,
                'category_name' => 'シンナー',
                'parent_id' => 6,
                'slug' => 'thinner',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 37,
                'category_name' => 'ポリッシング材',
                'parent_id' => 6,
                'slug' => 'polishing',
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 7調色関連商品
            [
                'id' => 38,
                'category_name' => 'カラーカード',
                'parent_id' => 7,
                'slug' => 'color-kard',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 39,
                'category_name' => '配合検索システム',
                'parent_id' => 7,
                'slug' => 'combination-search',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 40,
                'category_name' => '機器類',
                'parent_id' => 7,
                'slug' => 'machinery',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
