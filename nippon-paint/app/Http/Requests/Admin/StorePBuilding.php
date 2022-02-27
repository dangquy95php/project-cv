<?php

namespace App\Http\Requests\Admin;

use App\Models\PBuilding;
use App\Models\PLarge;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePBuilding extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nks_no' => 'max:255',
            'nks_ver_no' => 'nullable|numeric',
            'status' => [
                'required',
                Rule::in(array_keys(PBuilding::STATUS_LIST))
            ],
            'product_name' => [
                'required',
                'max:255',
                isset($this->p_building->id) ? "unique:p_buildings,product_name,{$this->p_building->id},id" : "unique:p_buildings,product_name",
            ],
            'thumbnail' => 'max:255',
            'p_building_subcategory_id' => 'nullable|required_if:status,1|exists:p_building_subcategories,id',
            'product_name_kana' => 'required_if:status,1|kana_for_search',
            'general_name' => 'max:255',
            'description' => '',
            'documents' => 'array',
            'documents.*.id' => 'exists:documents,id',
            'feature' => 'required_if:status,1',
            'resins' => 'array',
            'resins.*' => 'exists:p_building_resins,id',
            'base_id' => 'required_if:status,1',
            'pack_type_id' => 'required_if:status,1',
            'packings' => 'array',
            'packings.*.type' => 'max:255',
            'packings.*.amount' => [
                'required',
                'regex:/^([1-9]\d*|0)(\.\d+)?$/'
            ],
            'packings.*.unit_id' => [
                'required',
                Rule::in(array_keys(PBuilding::UNIT_LIST_VOL))
            ],
            'additional_related_pages' => 'array',
            'additional_related_pages.*.indication' => 'required|max:255',
            'additional_related_pages.*.url' => 'required|max:255|url',
            'additional_related_pages.*.type' => ['required', Rule::in(array_keys(PBuilding::URL_TYPE_LIST))],
            'materials' => 'array',
            'jis_numbers' => 'array',
            'jis_numbers.*' => 'exists:p_building_jis_numbers,id',
            'use_housing' => [
                'nullable',
                Rule::in(array_keys(PBuilding::SUITABILITY)),
            ],
            'use_condominium' => [
                'nullable',
                Rule::in(array_keys(PBuilding::SUITABILITY)),
            ],
            'use_institution' => [
                'nullable',
                Rule::in(array_keys(PBuilding::SUITABILITY)),
            ],
            'use_office' => [
                'nullable',
                Rule::in(array_keys(PBuilding::SUITABILITY)),
            ],
            'use_factory' => [
                'nullable',
                Rule::in(array_keys(PBuilding::SUITABILITY)),
            ],
            'use_steel_structure' => [
                'nullable',
                Rule::in(array_keys(PBuilding::SUITABILITY)),
            ],
            'use_detail' => '',
            'purposes' => 'array',
            'purposes.*' => 'exists:p_building_purposes,id',
            'standard' => '',
            'applicable_base' => '',
            'sealers' => 'array',
            'sealers.*' => (function($attribute, $value, $fail){
                $id_explode = explode(':', $value);
                if((int) $id_explode[0] === PBuilding::BUILDING){
                    $product = PBuilding::find($id_explode[1]);
                }elseif((int) $id_explode[0] === PLarge::LARGE){
                    $product = PLarge::find($id_explode[1]);
                }
                if(!$product){
                    return $fail('指定されたIDの製品は存在しません');
                }
            }),
            'middle_coats' => 'array',
            'middle_coats.*' => (function($attribute, $value, $fail){
                $id_explode = explode(':', $value);
                if((int) $id_explode[0] === PBuilding::BUILDING){
                    $product = PBuilding::find($id_explode[1]);
                }elseif((int) $id_explode[0] === PLarge::LARGE){
                    $product = PLarge::find($id_explode[1]);
                }
                if(!$product){
                    return $fail('指定されたIDの製品は存在しません');
                }
            }),
            'topcoats' => 'array',
            'topcoats.*' => (function($attribute, $value, $fail){
                $id_explode = explode(':', $value);
                if((int) $id_explode[0] === PBuilding::BUILDING){
                    $product = PBuilding::find($id_explode[1]);
                }elseif((int) $id_explode[0] === PLarge::LARGE){
                    $product = PLarge::find($id_explode[1]);
                }
                if(!$product){
                    return $fail('指定されたIDの製品は存在しません');
                }
            }),
            'color' => '',
            'lusters' => 'array',
            'lusters.*' => 'exists:p_building_lusters,id',
            'painting_methods_suitable' => 'array',
            'painting_methods_usable' => 'array',
            'painting_methods_na' => 'array',
            'diluents' => 'array',
            'diluents.*' => 'exists:p_building_diluents,id',
            'processes' => 'array',
            'processes.*' => 'exists:p_building_processes,id',
            'pot_life' => '',
            'usage' => '',
            'dilution_rate' => '',
            'drying_time' => '',
            'color_lineup' => '',
            'price' => '',
            'finish_samples' => 'array',
            'finish_samples.*.image_title' => 'required',
            'finish_samples.*.image' => 'required',
            'related_information' => 'array',
            'related_information.*' => [
                Rule::in(array_keys(PBuilding::RELATED_INFO_LIST)),
            ],
            'free_area' => '',
        ];
    }

    public function messages()
    {
        return [
            'product_name_kana.kana_for_search' => '先頭文字は全角カナ・半角数字、二文字目以降は全角カナ・半角英数字・記号で入力してください。',
            'nks_no.required_if' => '公開時にはNKS製品番号は必須です',
            'nks_ver_no.required_if' => '公開時にはNKS製品版番は必須です',
            'p_building_subcategory_id.required_if' => '公開時には製品カテゴリは必須です',
            'product_name_kana.required_if' => '公開時には製品名カナは必須です',
            'feature.required_if' => '公開時には製品特長は必須です',
            'base_id.required_if' => '公開時には水性/溶剤は必須です',
            'pack_type_id.required_if' => '公開時には1液/2液は必須です',
            'packings.*.amount.regex' => '量は数字のみで入力してください。（小数点可）',
        ];
    }

    /*
     * バリデーション前
     */
    protected function prepareForValidation()
    {
        $fields = [
            'resins',
            'materials',
            'jis_numbers',
            'purposes',
            'lusters',
            'diluents',
            'processes',
            'sealers',
            'middle_coats',
            'topcoats',
            'painting_methods_suitable',
            'painting_methods_usable',
            'painting_methods_na',
        ];

        $prepared = [];
        foreach ($fields as $field){
            $prepared[$field] = [];
            if($this->$field){
                $prepared[$field] = explode(',', $this->$field);
            }
        }
        $this->merge($prepared);

        // フィールドを増やしていく系のフィールドで中身がない場合は空にしてしまう
        $finish_samples = [];
        if(!$this->finish_samples){
            $this->finish_samples = [];
        }
        foreach ($this->finish_samples as $sample){
            if($sample['image_title'] || $sample['image'] || array_key_exists('id', $sample)){
                $finish_samples[] = $sample;
            }
        }
        $this->merge(['finish_samples' => $finish_samples]);

        $packings = [];
        if(!$this->packings){
            $this->packings = [];
        }
        foreach ($this->packings as $packing){
            if($packing['type'] || $packing['amount'] || array_key_exists('unit_id', $packing)){
                $packings[] = $packing;
            }
        }
        $this->merge(['packings' => $packings]);

        $pages = [];
        if(!$this->additional_related_pages){
            $this->additional_related_pages = [];
        }
        foreach ($this->additional_related_pages as $page){
            if($page['indication'] || $page['url']){
                $pages[] = $page;
            }
        }
        $this->merge(['additional_related_pages' => $pages]);

        $this->merge(['documents' => json_decode($this->documents, true)]);
    }

    protected function passedValidation()
    {
        // 一部のフィールドはバリデーション通ってから文字列に戻す
        $fields = [
            'lusters',
            'diluents',
            'processes',
            'related_information'
        ];

        foreach ($fields as $field){
            if(is_array($this->$field)){
                $this->merge([$field => implode(',', $this->$field)]);
            }else{
                $this->merge([$field => '']);
            }
        }

        // ソートを追加
        $documents = collect($this->documents)
            ->mapWithKeys(function ($doc) {
                return [$doc['id'] => ['sort' => $doc['sort']]];
            })->toArray();
        $this->merge(['documents' => $documents]);
    }

    public function attributes()
    {
        return [
            'nks_no' => 'NKS製品番号',
            'nks_ver_no' => 'NKS製品版番',
            'status' => '公開ステータス',
            'product_name' => '製品名',
            'thumbnail' => 'サムネイル',
            'p_building_subcategory_id' => '製品カテゴリ',
            'product_name_kana' => '製品名カナ',
            'description' => '製品説明',
            'documents' => '資料',
            'feature' => '製品特長',
            'resins' => '樹脂',
            'base_id' => '水性/溶剤',
            'pack_type_id' => '1液/2液',
            'use_housing' => '用途（戸建て住宅）',
            'use_condominium' => '用途（マンション）',
            'use_institution' => '用途（教育施設・病院）',
            'use_office' => '用途（オフィス）',
            'use_factory' => '用途（工場倉庫）',
            'use_steel_structure' => '用途（鋼構造物）',
            'materials' => '素材',
            'jis_numbers' => 'JIS番号',
            'use_detail' => '用途詳細',
            'purposes' => '機能',
            'standard' => '規格',
            'applicable_base' => '適用下地',
            'sealers' => '適用下塗り塗料・下塗り材',
            'middle_coats' => '中塗り塗料',
            'topcoats' => '適用上塗り塗料・上塗り材',
            'color' => '色相',
            'lusters' => 'つや',
            'painting_methods_suitable' => '施工方法（適）',
            'painting_methods_usable' => '施工方法（可）',
            'painting_methods_na' => '施工方法（不可）',
            'diluents' => '希釈剤',
            'processes' => '工程',
            'pot_life' => 'ポットライフ',
            'usage' => '使用量',
            'dilution_rate' => '希釈率',
            'drying_time' => '乾燥時間',
            'color_lineup' => 'カラーラインナップ',
            'price' => '価格',
            'related_information' => '関連情報ページ',
            'additional_related_pages' => '関連情報ページ（独自）',
            'additional_related_pages.*.indication' => '表示名',
            'additional_related_pages.*.url' => 'リンク',
            'additional_related_pages.*.type' => '種類',
            'free_area' => '自由入力',
            'finish_samples.*.image' => '画像',
            'finish_samples.*.image_title' => '画像タイトル',
            'packings.*.amount' => '量',
            'packings.*.unit_id' => '単位',
        ];
    }
}
