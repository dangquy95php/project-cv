<?php

namespace App\Helpers;

use App\Models\PublicationModel;

class AdminHelper
{
    /**
     * 公開ステータスからBadgeスタイルをあてる関数
     *
     * @param string $value
     * @return string
     * 公開: success
     * 非公開: danger
     * 下書き: secondary
     * 公開(予約): info
     * ※合致なし: light
     */
    public static function publicStatusLabel2Badge($statusLabel)
    {
        $statusBadge = self::value2Badge($statusLabel); //※合致なし
        if ($statusLabel === '公開') {
            $statusBadge = self::value2Badge($statusLabel, 'success');
        }
        if ($statusLabel === '非公開') {
            $statusBadge = self::value2Badge($statusLabel, 'danger');
        }
        if ($statusLabel === '下書き') {
            $statusBadge = self::value2Badge($statusLabel, 'secondary');
        }
        if ($statusLabel === '公開(予約)') {
            $statusBadge = self::value2Badge($statusLabel, 'info');
        }

        return $statusBadge;
    }

    /**
     * 色を指定してBadgeスタイルをあてる関数
     * 参考: https://bootstrap-guide.com/components/badges
     * @param string $value
     * @return string
     */
    public static function value2Badge($value, $type = 'light')
    {
        $variations = [
            'primary' => 'badge-primary',
            'secondary' => 'badge-secondary',
            'success' => 'badge-success',
            'info' => 'badge-info',
            'warning' => 'badge-warning',
            'danger' => 'badge-danger',
            'light' => 'badge-light',
            'dark' => 'badge-dark'
        ];

        $valueBadge = '<span class="badge badge-light">' . $value . '</span>'; //デフォルトはbadge-light
        if (array_key_exists($type, $variations)) {
            $valueBadge = '<span class="badge ' . $variations[$type] . '">' . $value . '</span>';
        }

        return $valueBadge;
    }
}
