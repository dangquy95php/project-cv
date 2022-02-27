<?php

namespace App\Models;

use App\Traits\S3Handler;
use Kyslik\ColumnSortable\Sortable;

class Document extends PublicationModel
{
    use Sortable;

    public $sortable = ['id', 'updated_at'];
    protected $guarded = ['created_at', 'updated_at'];

    public static $document_path = 'product/document/document_file';
    public static $thumbnail_path = 'product/document/thumbnail';

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

    const DOCUMENT_CATEGORY_LIST = [
        Product::BUILDING => [
            ['label' => 'カタログ', 'value' => self::BUILDING_CATALOG,],
            ['value' => self::BUILDING_INSTRUCTION, 'label' => '説明書'],
            ['value' => self::SERIES_CATALOG, 'label' => 'シリーズカタログ'],
            ['value' => self::CONSTRUCTION_MANUAL, 'label' => '施工要領書'],
            ['value' => self::COLOR_CHART, 'label' => '色見本'],
            [
                'label' => '防火材料等証明書',
                'value' => [
                    ['value' => self::FIRESAFE_CERT_AEP, 'label' => '塗料塗装（合成樹脂エマルシヨンペイント）'],
                    ['value' => self::FIRESAFE_CERT_SOP, 'label' => '塗料塗装（合成樹脂調合ペイント）'],
                    ['value' => self::FIRESAFE_CERT_FE, 'label' => '塗料塗装（フタル酸樹脂エナメル）'],
                    ['value' => self::FIRESAFE_CERT_NAD, 'label' => '塗料塗装（アクリル樹脂系非水分散形塗料）'],
                    ['value' => self::FIRESAFE_CERT_EPG, 'label' => '塗料塗装（つや有り合成樹脂エマルションペイント）'],
                    ['value' => self::FIRESAFE_CERT_EPT, 'label' => '塗料塗装（合成樹脂エマルション模様塗料）'],
                    ['value' => self::FIRESAFE_CERT_YS, 'label' => '有機質砂壁状塗料塗り'],
                    ['value' => self::FIRESAFE_CERT_MS, 'label' => '無機質砂壁状吹付材塗'],
                    ['value' => self::FIRESAFE_CERT_FK, 'label' => '複合型化粧用仕上塗り'],
                ]
            ],
        ],
        Product::LARGE => [
            ['value' => self::LARGE_INSTRUCTION, 'label' => '製品使用説明書'],
            ['value' => self::LARGE_CATALOG, 'label' => '製品カタログ'],
            ['value' => self::LARGE_PERFORMANCE, 'label' => '製品成分性能表']
        ],
        Product::LARGE_SPEC => [
            ['value' => self::PAINTING_SPECS, 'label' => '塗装仕様書']
        ],
        Product::AUTOMOTIVE => [
            [
                'label' => 'カタログ・コンセプトブック',
                'value' => [
                    ['value' => self::AUTO_CATALOG_BASE, 'label' => 'カタログ（ベース）'],
                    ['value' => self::AUTO_CATALOG_CLEAR, 'label' => 'カタログ（クリヤー）'],
                    ['value' => self::AUTO_CATALOG_PUTTY, 'label' => 'カタログ（パテ）'],
                    ['value' => self::AUTO_CATALOG_PRASAF, 'label' => 'カタログ（プラサフ）'],
                    ['value' => self::AUTO_CATALOG_PRIMER, 'label' => 'カタログ（プライマー）'],
                    ['value' => self::AUTO_CATALOG_ADJUSTER, 'label' => 'カタログ（調整システム）'],
                    ['value' => self::AUTO_CATALOG_OTHER, 'label' => 'その他'],
                    ['value' => self::AUTO_CONCEPT_BOOK, 'label' => 'コンセプトブック'],
                    ['value' => self::AUTO_INSTALLATION_SET, 'label' => '導入セットカタログ'],
                    ['value' => self::AUTO_FLIER, 'label' => 'チラシ'],
                ],
            ],
            ['value' => self::AUTO_OTHER, 'label' => 'その他資料']
        ]
    ];

    public function p_buildings()
    {
        return $this->belongsToMany(PBuilding::class)->withPivot('sort');
    }

    public function published_p_buildings()
    {
        return $this->belongsToMany(PBuilding::class)
            ->published()
            ->withPivot('sort');
    }

    public static function getAttachableDocumentsList($product_id)
    {
        return self::query()
            ->where('product_category_id', $product_id)
            ->orderby('document_category_id')->orderBy('document_name_kana')
            ->get()->map(function ($item) {
                return [
                    'name' => self::getFlattenCategoryList()->get($item->document_category_id) . '｜' . $item->document_name,
                    'id' => $item->id
                ];
            });
    }

    public static function getPLargeInstructionsList()
    {
        return self::query()
            ->where('document_category_id', self::LARGE_INSTRUCTION)
            ->orderBy('document_name_kana')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->document_name,
                    'id' => $item->id
                ];
            });
    }

    public static function getAutomotiveDocsList()
    {
        return self::query()
            ->where('document_category_id', self::AUTO_OTHER)
            ->orderby('document_category_id')->orderBy('document_name_kana')
            ->get()->map(function ($item) {
                return [
                    'name' => self::getFlattenCategoryList()->get($item->document_category_id) . '｜' . $item->document_name,
                    'id' => $item->id
                ];
            });
    }

    public static function getAutomotiveCatalogsList()
    {
        return self::query()
            ->whereIn('document_category_id', [
                self::AUTO_CATALOG_BASE,
                self::AUTO_CATALOG_CLEAR,
                self::AUTO_CATALOG_PUTTY,
                self::AUTO_CATALOG_PRASAF,
                self::AUTO_CATALOG_PRIMER,
                self::AUTO_CATALOG_ADJUSTER,
                self::AUTO_CATALOG_OTHER,
                self::AUTO_CONCEPT_BOOK,
                self::AUTO_INSTALLATION_SET,
                self::AUTO_FLIER,
            ])
            ->orderby('document_category_id')->orderBy('document_name_kana')
            ->get()->map(function ($item) {
                return [
                    'name' => self::getFlattenCategoryList()->get($item->document_category_id) . '｜' . $item->document_name,
                    'id' => $item->id
                ];
            });
    }

    public function scopeSearch($query, $params)
    {
        if (!empty($params['document_category_id'])) {
            $query->where('document_category_id', '=', $params['document_category_id']);
        }
        if (!empty($params['keyword'])) {
            $query->where(function ($query) use ($params) {
                $query->where('document_name', 'like', "%{$params['keyword']}%")
                      ->orWhere('document_file', 'like', "%{$params['keyword']}%");
            });
        }
    }

    public static function getProductCategoryList()
    {
        return collect(Product::PRODUCT_CATEGORY);
    }

    public static function getDocsCategoryList()
    {
        return collect(self::DOCUMENT_CATEGORY_LIST);
    }

    public static function getCategoryListForSearch()
    {
        return collect(self::DOCUMENT_CATEGORY_LIST)
            ->mapWithKeys(function ($item, $key) {
                $value = collect($item)
                    ->mapWithKeys(function ($item) {
                        if (is_array($item['value'])) {
                            $value = collect($item['value'])->mapWithKeys(function ($item) {
                                return [$item['value'] => $item['label']];
                            })->toArray();
                            return [$item['label'] => $value];
                        } else {
                            return [$item['value'] => $item['label']];
                        }
                    })->toArray();
                return [Product::PRODUCT_CATEGORY[$key] => $value];
            });
    }

    public function getProductCategoryAttribute()
    {
        return Product::PRODUCT_CATEGORY[$this->product_category_id];
    }

    public function getDocumentCategoryAttribute()
    {
        return self::getFlattenCategoryList()->get($this->document_category_id);
    }

    public static function getFlattenCategoryList()
    {
        $array = [];
        foreach (self::DOCUMENT_CATEGORY_LIST as $parent_cat) {
            foreach ($parent_cat as $child_cat) {
                if (is_array($child_cat['value'])) {
                    foreach ($child_cat['value'] as $item) {
                        $array[$item['value']] = $child_cat['label'] . '｜' . $item['label'];
                    }
                } else {
                    $array[$child_cat['value']] = $child_cat['label'];
                }
            }
        }
        return collect($array);
    }

    public static function getFireCertsWithProducts()
    {
        return self::query()
            ->published()
            ->whereHas('published_p_buildings')
            ->get();
    }

    public function getValues()
    {
        $this->setAttribute('product_category_id', old('product_category_id', $this->product_category_id));
        $this->setAttribute('document_category_id', old('document_category_id', $this->document_category_id));
        return $this;
    }

    public function deleteFiles()
    {
        S3Handler::deleteFromS3(self::$document_path . '/' . $this->document_file);
        S3Handler::deleteFromS3(self::$thumbnail_path . '/' . $this->thumbnail);
    }

    /**
     * 資料のS3のフルパスを返す
     * @return string
     */
    public function getDocumentUrlPathAttribute()
    {
        return S3Handler::getFileUrl(self::$document_path . '/' . $this->document_file);
    }

    /**
     * サムネイルのS3のフルパスを返す
     * @return string
     */
    public function getThumbnailUrlPathAttribute()
    {
        return S3Handler::getFileUrl(self::$thumbnail_path . '/' . $this->thumbnail);
    }

    public function getThumbnailUrlPathFrontAttribute()
    {
        if ($this->thumbnail) {
            return S3Handler::getFileUrl(self::$thumbnail_path . '/' . $this->thumbnail);
        }
        return null;
    }

    public function scopeSearchByCategory($query, array $categories)
    {
        $query->whereIn('document_category_id', $categories);
    }

    public static function getDocsByCategory($category_id)
    {
        return self::query()
            ->where('document_category_id', $category_id)
            ->published()
            ->get();
    }
}
