<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    const COLOR_SAMPLE = 1;    // 色見本帳お問い合わせID

    const CONTACT_URL_EN_LIST = [
        self::COLOR_SAMPLE => 'color-sample',
    ];

    const CONTACT_URL_JA_LIST = [
        self::COLOR_SAMPLE => '見本帳請求',
    ];

    protected $fillable = [
        'form_id',
        'contact',
    ];

    protected $casts = [
        'contact' => 'json',
    ];

    /**
     * マスターのCONTACT_URL_EN_LISTをもとに、問い合わせフォームのIDを取得
     * @return int|string
     */
    public static function findFormId()
    {
        $contact_url = request()->path();

        foreach (self::CONTACT_URL_EN_LIST as $i => $url) {
            if (preg_match("/{$url}/u", $contact_url)) {
                return $i;
            }
        }
    }

    /**
     * アンケートのカテゴリごとに配列を生成
     * チェックボックスにチェックが入っていなかった項目は文字列「empty」に置換。
     * @param $template
     * @param $questionnaire
     * @param $other
     * @return array
     */
    public static function adjustQuestionnaire($template, $questionnaire, $other)
    {
        $result = [];

        foreach ($template as $contact) {
            if (in_array($contact, $questionnaire, true)) {
                $result[] = $contact;
            } else {
                $result[] = 'empty';
            }
        }

        if (empty($other)) {
            $result[] = 'empty';
        } else {
            $result[] = $other;
        }

        return $result;
    }

    /**
     * お問い合わせ内容をJSON形式に形成
     * @param $contacts
     * @return array
     */
    public static function convertContactToJson($contacts)
    {
        $date = Carbon::now()->format('Y/m/d H:i:s');
        $form_name = self::CONTACT_URL_JA_LIST[self::findFormId()];
        $pro_journal = self::adjustQuestionnaire(ContactColorSample::$pro_journals, $contacts->pro_journals ?? [], $contacts->pro_journal_text);
        $homepage = self::adjustQuestionnaire(ContactColorSample::$homepages, $contacts->homepages ?? [], $contacts->homepage_text);
        $other = self::adjustQuestionnaire(ContactColorSample::$others, $contacts->others ?? [], $contacts->other_text);
        $construction = self::adjustQuestionnaire(ContactColorSample::$constructions, $contacts->constructions ?? [], $contacts->construction_text);

        $contact =
            [
                'お問い合わせ日' => $date,
                'お問い合わせフォーム' => $form_name,
                'お名前' => $contacts->name,
                'よみがな' => $contacts->yomigana,
                '会社名' => $contacts->company ?? '',
                '部署名' => $contacts->dept ?? '',
                '業種' => $contacts->sector,
                'eメール' => $contacts->email,
                '郵便番号' => $contacts->postal_code,
                '都道府県' => $contacts->pref,
                '住所' => $contacts->address,
                '電話番号' => $contacts->phone,
                '専門誌' => $pro_journal,
                'ホームページ' => $homepage,
                '上記以外の方法' => $other,
                '主な工事内容' => $construction,
            ];

        return $contact;
    }

    /**
     * 渡されたお問い合わせ内容をもとに、CSVファイルを生成
     * @param $contacts
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function createCsvFile($contacts)
    {
        return response()->streamDownload(
            function () use ($contacts) {
                // ファイル生成
                $stream = fopen('php://output', 'w');
                // 文字コードをShift-JISに変換
                stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

                foreach ($contacts as $contact) {
                    $contact = $contact['contact'];

                    $row =
                        [
                            $contact['お問い合わせ日'],
                            $contact['お問い合わせフォーム'],
                            $contact['お名前'],
                            $contact['よみがな'],
                            $contact['会社名'] ?? '',
                            $contact['部署名'] ?? '',
                            $contact['業種'],
                            $contact['eメール'],
                            $contact['郵便番号'],
                            $contact['都道府県'],
                            $contact['住所'],
                            $contact['電話番号'],
                        ];

                    foreach ($contact['専門誌'] as $item) {
                        if ($item === 'empty') {
                            $row[] = '';
                        } else {
                            $row[] = $item;
                        }
                    }

                    foreach ($contact['ホームページ'] as $item) {
                        if ($item === 'empty') {
                            $row[] = '';
                        } else {
                            $row[] = $item;
                        }
                    }

                    foreach ($contact['上記以外の方法'] as $item) {
                        if ($item === 'empty') {
                            $row[] = '';
                        } else {
                            $row[] = $item;
                        }
                    }

                    foreach ($contact['主な工事内容'] as $item) {
                        if ($item === 'empty') {
                            $row[] = '';
                        } else {
                            $row[] = $item;
                        }
                    }

                    fputcsv($stream, $row);
                }
                fclose($stream);
            },
            Carbon::now()->format('YmdHis') . '_color_sample.csv',
            [
                'Content-Type' => 'text/csv',
            ]
        );
    }
}
