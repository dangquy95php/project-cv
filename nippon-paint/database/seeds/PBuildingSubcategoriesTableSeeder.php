<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PBuildingSubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_building_subcategories')->truncate();
        DB::table('p_building_subcategories')->insert([
            [
                'id' => 1,
                'category_name' => '外装用上塗り塗料',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'exterior-topcoat',
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'category_name' => '外装用仕上げ塗材',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'exterior-coating-material',
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'category_name' => '内装用塗料',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'interior-paint',
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'category_name' => '屋根用塗料',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'roof-paint',
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'category_name' => '下塗り塗料・下地調整材',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'undercoat-paint-base-adjustment-material',
                'updated_at' => $now
            ],
            [
                'id' => 6,
                'category_name' => '鉄部用塗料',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'iron-part-paint',
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'category_name' => '床・路面用塗料',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'floor-road-surface-paint',
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'category_name' => '屋上防水材',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'roof-waterproofing-material',
                'updated_at' => $now
            ],
            [
                'id' => 9,
                'category_name' => 'シーリング材',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'sealing-material',
                'updated_at' => $now
            ],
            [
                'id' => 10,
                'category_name' => '現場用添加剤',
                'parent_id' => null,
                'created_at' => $now,
                'slug' => 'on-site-additive',
                'updated_at' => $now
            ],
            [
                'id' => 11,
                'category_name' => '水性塗料',
                'parent_id' => 1,
                'created_at' => $now,
                'slug' => 'water-paint',
                'updated_at' => $now
            ],
            [
                'id' => 12,
                'category_name' => '弱溶剤系塗料',
                'parent_id' => 1,
                'created_at' => $now,
                'slug' => 'weak-solvent',
                'updated_at' => $now
            ],
            [
                'id' => 13,
                'category_name' => '溶剤系塗料',
                'parent_id' => 1,
                'created_at' => $now,
                'slug' => 'solvent',
                'updated_at' => $now
            ],
            [
                'id' => 14,
                'category_name' => '外壁用遮熱塗料',
                'parent_id' => 1,
                'created_at' => $now,
                'slug' => 'heat-proof',
                'updated_at' => $now
            ],
            [
                'id' => 15,
                'category_name' => '陶磁器タイル用塗料',
                'parent_id' => 1,
                'created_at' => $now,
                'slug' => 'ceramic-tile',
                'updated_at' => $now
            ],
            [
                'id' => 16,
                'category_name' => '高意匠サイディングボード保護用クリヤー',
                'parent_id' => 1,
                'created_at' => $now,
                'slug' => 'protection-clear',
                'updated_at' => $now
            ],
            [
                'id' => 17,
                'category_name' => '複層仕上げ塗材（硬質）',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'hard-multi-layer',
                'updated_at' => $now
            ],
            [
                'id' => 18,
                'category_name' => '複層仕上げ塗材（弾性）',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'elastic-multi-layer',
                'updated_at' => $now
            ],
            [
                'id' => 19,
                'category_name' => '単層弾性塗材',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'single-layer-elastic',
                'updated_at' => $now
            ],
            [
                'id' => 20,
                'category_name' => '可とう形改修塗材',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'repair',
                'updated_at' => $now
            ],
            [
                'id' => 21,
                'category_name' => '薄付け仕上げ塗材',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'thin',
                'updated_at' => $now
            ],
            [
                'id' => 22,
                'category_name' => '厚付け仕上げ塗材',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'thick',
                'updated_at' => $now
            ],
            [
                'id' => 23,
                'category_name' => '装飾仕上げ塗材',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'decorative',
                'updated_at' => $now
            ],
            [
                'id' => 24,
                'category_name' => '打ち放しコンクリート用素材',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'exposed-concrete',
                'updated_at' => $now
            ],
            [
                'id' => 25,
                'category_name' => '新築塗装専用省工程塗装システム',
                'parent_id' => 2,
                'created_at' => $now,
                'slug' => 'new-process',
                'updated_at' => $now
            ],
            [
                'id' => 26,
                'category_name' => '平滑仕上げ塗料',
                'parent_id' => 3,
                'created_at' => $now,
                'slug' => 'smooth-finish',
                'updated_at' => $now
            ],
            [
                'id' => 27,
                'category_name' => '意匠系塗材',
                'parent_id' => 3,
                'created_at' => $now,
                'slug' => 'design-based',
                'updated_at' => $now
            ],
            [
                'id' => 28,
                'category_name' => '天井材',
                'parent_id' => 3,
                'created_at' => $now,
                'slug' => 'ceiling',
                'updated_at' => $now
            ],
            [
                'id' => 29,
                'category_name' => 'シーラー',
                'parent_id' => 3,
                'created_at' => $now,
                'slug' => 'sealer',
                'updated_at' => $now
            ],
            [
                'id' => 30,
                'category_name' => '屋根用遮熱塗料',
                'parent_id' => 4,
                'created_at' => $now,
                'slug' => 'roof-heat-shield',
                'updated_at' => $now
            ],
            [
                'id' => 31,
                'category_name' => 'スレート屋根/住宅用化粧スレート屋根用塗料',
                'parent_id' => 4,
                'created_at' => $now,
                'slug' => 'slate-house-slate',
                'updated_at' => $now
            ],
            [
                'id' => 32,
                'category_name' => '鋼板・トタン屋根用塗料',
                'parent_id' => 4,
                'created_at' => $now,
                'slug' => 'steel-plate-galvanized-iron',
                'updated_at' => $now
            ],
            [
                'id' => 33,
                'category_name' => '下塗り材（シーラー）',
                'parent_id' => 5,
                'created_at' => $now,
                'slug' => 'undercoat-sealer',
                'updated_at' => $now
            ],
            [
                'id' => 34,
                'category_name' => '下地調整材（フィラー）',
                'parent_id' => 5,
                'created_at' => $now,
                'slug' => 'base-conditioner-filler',
                'updated_at' => $now
            ],
            [
                'id' => 35,
                'category_name' => 'その他（木部・アスベスト飛散抑制・ブリード防止）',
                'parent_id' => 5,
                'created_at' => $now,
                'slug' => 'other',
                'updated_at' => $now
            ],
            [
                'id' => 36,
                'category_name' => 'さび止め塗料',
                'parent_id' => 6,
                'created_at' => $now,
                'slug' => 'anti-rust',
                'updated_at' => $now
            ],
            [
                'id' => 37,
                'category_name' => '中塗り塗料',
                'parent_id' => 6,
                'created_at' => $now,
                'slug' => 'intermediate',
                'updated_at' => $now
            ],
            [
                'id' => 38,
                'category_name' => '上塗り塗料',
                'parent_id' => 6,
                'created_at' => $now,
                'slug' => 'top',
                'updated_at' => $now
            ],
            [
                'id' => 39,
                'category_name' => '厚膜型',
                'parent_id' => 7,
                'created_at' => $now,
                'slug' => 'thick-film',
                'updated_at' => $now
            ],
            [
                'id' => 40,
                'category_name' => '薄膜型',
                'parent_id' => 7,
                'created_at' => $now,
                'slug' => 'thin-film',
                'updated_at' => $now
            ],
            [
                'id' => 41,
                'category_name' => '導電型',
                'parent_id' => 7,
                'created_at' => $now,
                'slug' => 'conductivity',
                'updated_at' => $now
            ],
            [
                'id' => 42,
                'category_name' => '下塗り',
                'parent_id' => 7,
                'created_at' => $now,
                'slug' => 'undercoat',
                'updated_at' => $now
            ],
            [
                'id' => 43,
                'category_name' => '路面用塗料・路面用遮熱塗料',
                'parent_id' => 7,
                'created_at' => $now,
                'slug' => 'surface-heat-shield',
                'updated_at' => $now
            ],
            [
                'id' => 44,
                'category_name' => 'ニッペ屋上塗膜防水材シリーズ',
                'parent_id' => 8,
                'created_at' => $now,
                'slug' => 'nippe-roof-coating',
                'updated_at' => $now
            ]
        ]);
    }
}
