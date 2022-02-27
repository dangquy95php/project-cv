<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveClassificationsSeeder extends Seeder
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
        DB::table('p_automotive_classifications')->truncate();
        DB::table('p_automotive_classifications')->insert([
            [
                'name' => 'カラーベース',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'クリヤー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'プラサフ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'パテ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'プライマー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハードナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '添加剤・補助剤',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '調色関連',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'カラー情報システム',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塗装関連用品',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

