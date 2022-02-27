<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('question_categories')->truncate();
        DB::table('question_categories')->insert([
            [
                'category_name' => '施工について',
                'parent_category_id' => 1,
                'slug' => 'construction',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => '環境・その他',
                'parent_category_id' => 1,
                'slug' => 'environment',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => '塗料の性能について',
                'parent_category_id' => 1,
                'slug' => 'performance',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => '塗装仕様について',
                'parent_category_id' => 1,
                'slug' => 'specification',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => '遮熱塗料について',
                'parent_category_id' => 1,
                'slug' => 'thermal-insulation',
                'created_at' => $now,
                'updated_at' => $now
            ],

            [
                'category_name' => 'large',
                'parent_category_id' => 2,
                'slug' => 'thermal-insulation1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'large1',
                'parent_category_id' => 2,
                'slug' => 'specification1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'large2',
                'parent_category_id' => 2,
                'slug' => 'environment1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'large3',
                'parent_category_id' => 2,
                'slug' => 'performance1',
                'created_at' => $now,
                'updated_at' => $now
            ],

            [
                'category_name' => 'automotive',
                'parent_category_id' => 3,
                'slug' => 'thermal-insulation2',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'automotive1',
                'parent_category_id' => 3,
                'slug' => 'specification2',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'automotive2',
                'parent_category_id' => 3,
                'slug' => 'environment2',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'automotive3',
                'parent_category_id' => 3,
                'slug' => 'performance2',
                'created_at' => $now,
                'updated_at' => $now
            ],

            [
                'category_name' => 'web_site',
                'parent_category_id' => 4,
                'slug' => 'thermal-insulation3',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'web_site1',
                'parent_category_id' => 4,
                'slug' => 'specification3',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'web_site2',
                'parent_category_id' => 4,
                'slug' => 'environment3',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'web_site3',
                'parent_category_id' => 4,
                'slug' => 'performance3',
                'created_at' => $now,
                'updated_at' => $now
            ],

            [
                'category_name' => 'painting_material',
                'parent_category_id' => 5,
                'slug' => 'thermal-insulation4',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'painting_material1',
                'parent_category_id' => 5,
                'slug' => 'specification4',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'painting_material2',
                'parent_category_id' => 5,
                'slug' => 'environment4',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'category_name' => 'painting_material3',
                'parent_category_id' => 5,
                'slug' => 'performance4',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
