<?php

use App\Models\PBuilding;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DocumentCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('document_categories')->truncate();
        DB::table('document_categories')->insert([
            // 建築
            [
                'id' => 1,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => 'カタログ',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '説明書',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => 'シリーズカタログ',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '施工要領書',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '色見本',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 防火材料等証明書
            [
                'id' => 6,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '合成樹脂エマルシヨンペイント',
                'parent_id' => 31,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '合成樹脂調合ペイント',
                'parent_id' => 31,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => 'フタル酸樹脂エナメル',
                'parent_id' => 31,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 9,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => 'アクリル樹脂系非水分散形塗料',
                'parent_id' => 31,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 10,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => 'つや有り合成樹脂エマルションペイント',
                'parent_id' => 31,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 11,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '合成樹脂エマルション模様塗料',
                'parent_id' => 31,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 12,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '有機質砂壁状塗料塗り',
                'parent_id' => 30,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 13,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '無機質砂壁状吹付材塗',
                'parent_id' => 30,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 14,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '複合型化粧用仕上塗り',
                'parent_id' => 30,
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 重防食製品
            [
                'id' => 15,
                'product_category_id' => PBuilding::LARGE,
                'category_name' => '製品使用説明書',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 16,
                'product_category_id' => PBuilding::LARGE,
                'category_name' => '製品カタログ',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 17,
                'product_category_id' => PBuilding::LARGE,
                'category_name' => '製品成分性能',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 重防食仕様
            [
                'id' => 18,
                'product_category_id' => PBuilding::LARGE_SPEC,
                'category_name' => '塗装仕様書',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 自動車
            [
                'id' => 19,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ（ベース）',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 20,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ（クリヤー）',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 21,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ（パテ）',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 22,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ（プラサフ）',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 23,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ（プライマー）',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 24,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ（調整システム）',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 25,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'その他',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 26,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'コンセプトブック',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 27,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => '導入セットカタログ',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 28,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'チラシ',
                'parent_id' => 32,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 29,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'その他資料',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            // 親カテゴリ
            [
                'id' => 30,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '防火材料等証明書',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 31,
                'product_category_id' => PBuilding::BUILDING,
                'category_name' => '塗料塗装',
                'parent_id' => 30,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 32,
                'product_category_id' => PBuilding::AUTOMOTIVE,
                'category_name' => 'カタログ・コンセプトブック',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
