<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeDiluentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_diluents')->truncate();
        DB::table('p_large_diluents')->insert([
            [
                'name' => 'ビニレックス510アクチブプライマ－シンナ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンキー1500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンキー1500シンナーS',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンキー1500シンナー低温用',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンキー8500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンク8500SCシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塗料用シンナーA',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '塗料用シンナーSA',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ1500Kシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイラバーEシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポタールシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポタール速乾型シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナーS',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナーW',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシHシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンウレタンシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンウレタンシンナーS',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンウレタンシンナーW',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'テツゾール煙道用300シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'テツゾール専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュⅡシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュⅡシンナーS',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュⅡシンナーW',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガードエポキシシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガードウレタンシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガードFフレッシュシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガードNEシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペスリークシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペセラモ40シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペセラモ20シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '水道水',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'スチレンモノマー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'タイカリットベースコート用シンナー',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
