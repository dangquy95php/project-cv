<?php

namespace App\Http\Requests\Admin;

use App\Models\PAutomotive;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePAutomotive extends FormRequest
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
                Rule::in(array_keys(PAutomotive::STATUS_LIST))
            ],
            'p_automotive_subcategory_id' => 'nullable|required_if:status,'.PAutomotive::TO_PUBLIC.'|exists:p_automotive_subcategories,id',
            'product_name' => [
                'required',
                'max:255',
                isset($this->p_automotive->id) ? "unique:p_automotives,product_name,{$this->p_automotive->id},id" : "unique:p_automotives,product_name",
            ],
            'product_name_kana' => 'required_if:status,'.PAutomotive::TO_PUBLIC.'|kana_for_search',
            'logo' => 'max:255',
            'image' => 'max:255',
            'labels' => 'array',
            'labels.*' => 'exists:p_automotive_labels,id',
            'description' => '',
            'feature' => 'required_if:status,'.PAutomotive::TO_PUBLIC,
            'classification' => 'nullable|required_if:status,'.PAutomotive::TO_PUBLIC.'|exists:p_automotive_classifications,id',
            'base_id' => 'exists:p_automotive_bases,id',
            'pack_type_id' => 'exists:p_automotive_pack_types,id',
            'regulations' => 'array',
            'regulations.*' => 'exists:p_automotive_regulations,id',
            'fire_laws_classifications' => 'array',
            'fire_laws_classifications.*' => 'exists:p_automotive_fire_law_classifications,id',
            'hardener_ratio' => 'nullable|exists:p_automotive_hardener_ratios,id',
            'applicable_clear_paints' => 'nullable|exists:p_automotives,id',
            'documents' => 'array',
            'documents.*.id' => 'exists:documents,id',
            'catalogs' => 'array',
            'catalogs.*.id' => 'exists:documents,id',
            'additional_related_pages' => 'array',
            'additional_related_pages.*.indication' => 'required|max:255',
            'additional_related_pages.*.url' => 'required|max:255|url',
            'additional_related_pages.*.type' => ['required', Rule::in(array_keys(PAutomotive::URL_TYPE_LIST))],
            'hardeners' => 'nullable|exists:p_automotives,id',
            'diluents' => 'nullable|exists:p_automotives,id',
        ];
    }

    public function messages()
    {
        return [
            'product_name_kana.kana_for_search' => '先頭文字は全角カナ・半角数字、二文字目以降は全角カナ・半角英数字・記号で入力してください。',
            'nks_no.required_if' => '公開時にはNKS製品番号は必須です',
            'nks_ver_no.required_if' => '公開時にはNKS製品版番は必須です',
            'p_automotive_subcategory_id.required_if' => '公開時には製品カテゴリは必須です',
            'product_name_kana.required_if' => '公開時には製品名カナは必須です',
            'labels.required_if' => '公開時にはラベルは必須です',
            'classification.required_if' => '公開時には製品分類は必須です',
            'feature.required_if' => '公開時には製品特長は必須です',
            'base_id.required_if' => '公開時には水性/溶剤は必須です',
            'pack_type_id.required_if' => '公開時には1液/2液は必須です',
        ];
    }

    /*
     * バリデーション前
     */
    protected function prepareForValidation()
    {
        $fields = [
            'labels',
            'fire_laws_classifications',
            'characteristics',
            'applicable_clear_paints',
            'hardeners',
            'diluents'
        ];

        $prepared = [];
        foreach ($fields as $field){
            $prepared[$field] = [];
            if($this->$field){
                $prepared[$field] = explode(',', $this->$field);
            }
        }
        $this->merge($prepared);

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
        $this->merge(['catalogs' => json_decode($this->catalogs, true)]);
    }

    protected function passedValidation()
    {
        // 一部のフィールドはバリデーション通ってから文字列に戻す
        $fields = [
            'labels',
            'fire_laws_classifications'
        ];

        foreach ($fields as $field){
            if(is_array($this->$field)){
                $this->merge([$field => implode(',', $this->$field)]);
            }
        }

        // ソートを追加
        $documents = collect($this->documents)
            ->mapWithKeys(function ($doc) {
                return [$doc['id'] => ['sort' => $doc['sort']]];
            })->toArray();
        $this->merge(['documents' => $documents]);

        $catalogs = collect($this->catalogs)
            ->mapWithKeys(function ($doc) {
                return [$doc['id'] => ['sort' => $doc['sort']]];
            })->toArray();
        $this->merge(['catalogs' => $catalogs]);
    }

    public function attributes()
    {
        return [
            'nks_no' => 'NKS製品番号',
            'nks_ver_no' => 'NKS製品版番',
            'status' => '公開ステータス',
            'p_automotive_subcategory_id' => '製品カテゴリ',
            'product_name' => '製品名',
            'product_name_kana' => '製品名カナ',
            'logo' => '製品ロゴ',
            'image' => '製品イメージ',
            'labels' => 'ラベル',
            'description' => '製品説明',
            'feature' => '特長',
            'classification' => '製品分類',
            'base_id' => '水性/溶剤',
            'pack_type_id' => '1液/2液',
            'fire_laws_classifications' => '消防法区分',
            'hardener_ratio' => '硬化剤比率',
            'hardener_ratio_supplement' => '硬化剤比率（補足）',
            'content' => '容量',
            'color' => '色相',
            'mixing_ratio' => '希釈率',
            'applicable_material' => '適応素材',
            'applicable_clear_paints' => '適応クリヤー',
            'mixing_ratio_table' => '混合比',
            'drying_time' => '乾燥',
            'pot_life' => 'ポットライフ',
            'resin_specs' => '樹脂仕様',
            'free_area' => '自由入力',
            'documents' => '資料',
            'diluents' => '希釈剤',
            'hardeners' => '硬化剤',
            'additional_related_pages' => '関連情報ページ',
            'additional_related_pages.*.indication' => '表示名',
            'additional_related_pages.*.url' => 'リンク',
            'additional_related_pages.*.type' => '種類',
        ];
    }
}
