<?php

namespace App\Models;

abstract class AdditionalRelatedPage extends PublicationModel
{
    const IN_SITE = 1; // サイト内リンク
    const OUT_SITE = 2; // 外部リンク
    const MOVIE = 3; // 動画
    const PDF = 4; // PDF

    const URL_TYPE_LIST = [
        self::IN_SITE => 'サイト内リンク',
        self::OUT_SITE => '外部リンク',
        self::MOVIE => '動画',
        self::PDF => 'PDF',
    ];

    const URL_TYPE_MARK = [
        self::IN_SITE => 'arrow',
        self::OUT_SITE => 'arrow',
        self::MOVIE => 'youtube',
        self::PDF => 'arrow',
    ];
}
