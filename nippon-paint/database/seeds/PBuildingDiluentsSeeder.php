<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingDiluentsSeeder extends Seeder
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
        DB::table('p_building_diluents')->truncate();
        DB::table('p_building_diluents')->insert([
            [
                'name' => '水道水',
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
                'name' => '無希釈',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペケンエースGアクトシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ建築アクリル用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ建築ウレタン用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ建築エポキシ用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ建築シリコン用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロンシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペパワーバインドTKシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペパワーバインド刷毛用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニエポック500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペマイティラック(10:1)シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペパワーバインド刷毛･ローラー用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ラバラック3500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイラバーEシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナーW',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンウレタンシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'クリンカラーAシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'クリンカラーEシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'クリンカラーUシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ700シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ1500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ2500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペサンクィックシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ビニレックス510アクチブプライマーシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペファインルーフシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペOFP上塗専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペOFP下塗専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペマスチックC化粧仕上材用ウスメ液',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '槌印トタンペイントウスメ液',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シンナーノNKS作成用',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'naxマルチウレタンシンナー各種',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'naxマイティラックG-Ⅱシンナー各種',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ マイティラック(10:1)シンナー各種',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'naxポリパテウスメ液',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポタールシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペパワーバインドシンナー各種',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニパック500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニパック502クイックシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペロードラインシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ロードライン2500シンナー',
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
                'name' => 'ハイポンエポキシHシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポン10シンナー',
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
                'name' => 'ハイポンエポキシシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガ-ドウレタンシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガ-ドウレタンシンナーS',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガ-ドエポキシシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンウレタンシンナーW',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナー S',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンエポキシシンナーW',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100上塗シンナー S',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タイカリットベースコート用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュシンナー W',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュシンナーS',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュシンナー/S/W',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガードFフレッシュシンナー(S)',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'タフガードFフレッシュシンナー(W)',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'テツゾール専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポン2000/5000 専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'テツゾール2751専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'テツゾール煙道用300シンナー',
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
                'name' => 'ニッペジンキ-1500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペセラモ#40シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンク8500SCシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペジンキー8500シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイラバーEシンナ-スプレ-用',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイラバーEシンナ-W',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイラバーEシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイラバーEシンナーローラー用',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ビニレツクス510アクチブプライマーシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ スリークシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペ1500Kシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ニッペセラモ#20シンナー(冬用)',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '水道水',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'テツゾールNZ-400HB専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ハイポンAZ専用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'スチレンモノマー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アセトン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'naxスタビR各種',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニポン400静電用シンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニエポック60 スーパースロー シンナー N',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニエポック60 スロー シンナー N',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニエポック60 スタンダード シンナー N',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニエポック60 クイック シンナー N',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ユニエポック60 スーパークイック シンナー N',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュⅡシンナー',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'デュフロン100フレッシュⅡシンナー/S/W',
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
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
