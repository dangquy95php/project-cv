<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    // 建築
    const BUILDING_CATALOG = 1;
    const BUILDING_INSTRUCTION = 2;
    const SERIES_CATALOG = 3;
    const CONSTRUCTION_MANUAL = 4;
    const COLOR_CHART = 5;
    const FIRESAFE_CERT_AEP = 6;
    const FIRESAFE_CERT_SOP = 7;
    const FIRESAFE_CERT_FE = 8;
    const FIRESAFE_CERT_NAD = 9;
    const FIRESAFE_CERT_EPG = 10;
    const FIRESAFE_CERT_EPT = 11;
    const FIRESAFE_CERT_YS = 12;
    const FIRESAFE_CERT_MS = 13;
    const FIRESAFE_CERT_FK = 14;
    // 重防食製品
    const LARGE_INSTRUCTION = 15;
    const LARGE_CATALOG = 16;
    const LARGE_PERFORMANCE = 17;
    // 重防食仕様
    const PAINTING_SPECS = 18;
    // 自動車
    const AUTO_CATALOG_BASE = 19;
    const AUTO_CATALOG_CLEAR = 20;
    const AUTO_CATALOG_PUTTY = 21;
    const AUTO_CATALOG_PRASAF = 22;
    const AUTO_CATALOG_PRIMER = 23;
    const AUTO_CATALOG_ADJUSTER = 24;
    const AUTO_CATALOG_OTHER = 25;
    const AUTO_CONCEPT_BOOK = 26;
    const AUTO_INSTALLATION_SET = 27;
    const AUTO_FLIER = 28;
    const AUTO_OTHER = 29;

    const FIRE_PROTECTING = 30;
    const FIRE_PROTECTING_SUBCATEGORY = 31;

    const FIRESAFE_CATEGORIES = [
        self::FIRESAFE_CERT_AEP,
        self::FIRESAFE_CERT_SOP,
        self::FIRESAFE_CERT_FE,
        self::FIRESAFE_CERT_NAD,
        self::FIRESAFE_CERT_EPG,
        self::FIRESAFE_CERT_EPT,
        self::FIRESAFE_CERT_YS,
        self::FIRESAFE_CERT_MS,
        self::FIRESAFE_CERT_FK,
    ];

    const CATALOG_CATEGORIES = [
        self::BUILDING_CATALOG,
        self::SERIES_CATALOG
    ];


    public function parent_category()
    {
        return $this->belongsTo(DocumentCategory::class, 'parent_id', 'id');
    }

    public function child_categories()
    {
        return $this->hasMany(DocumentCategory::class, 'parent_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
