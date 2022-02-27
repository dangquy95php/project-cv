<?php

namespace App\Http\Requests\Admin;

use App\Models\PLarge;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePLarge extends FormRequest
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
                Rule::in(array_keys(PLarge::STATUS_LIST))
            ],
            'product_name' => [
                'required',
                'max:255',
                isset($this->p_large->id) ? "unique:p_larges,product_name,{$this->p_large->id},id" : "unique:p_larges,product_name",
            ],
            'product_name_kana' => 'required_if:status,'.PLarge::TO_PUBLIC.'|kana_for_search',
            'thumbnail' => 'max:255',
            'documents' => 'array',
            'documents.*.id' => 'exists:documents,id',
            'general_name' => 'required_if:status,'.PLarge::TO_PUBLIC.'|max:255',
            'general_standard_number' => 'max:255',
            'jis_number' => 'max:255',
            'systems' => 'array|required_if:status,'.PLarge::TO_PUBLIC,
            'system.*' => 'exists:p_large_systems,id',
            'solvent_type' => 'nullable|numeric|exists:p_large_solvent_types,id',
            'diluents' => 'array',
            'diluents.*' => 'exists:p_large_diluents,id',

        ];
    }

    public function messages()
    {
        return [
            'product_name_kana.kana_for_search' => '先頭文字は全角カナ・半角数字、二文字目以降は全角カナ・半角英数字・記号で入力してください。',
            'nks_no.required_if' => '公開時にはNKS製品番号は必須です',
            'nks_ver_no.required_if' => '公開時にはNKS製品版番は必須です',
            'product_name_kana.required_if' => '公開時には製品名カナは必須です',
            'general_name.required_if' => '公開時には一般名称(民間)は必須です',
            'systems.required_if' => '公開時には塗料系統は必須です',
        ];
    }

    /*
     * バリデーション前
     */
    protected function prepareForValidation()
    {
        $fields = [
            'systems',
            'diluents',
        ];

        $prepared = [];
        foreach ($fields as $field){
            $prepared[$field] = [];
            if($this->$field){
                $prepared[$field] = explode(',', $this->$field);
            }
        }
        $this->merge($prepared);
        $this->merge(['documents' => json_decode($this->documents, true)]);
    }

    protected function passedValidation()
    {
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
            'product_name_kana' => '製品名カナ',
            'thumbnail' => 'サムネイル',
            'description' => '製品説明',
            'documents' => '製品資料',
            'general_name' => '一般名称(民間)',
            'general_standard_number' => '製品規格番号(民間)',
            'jis_number' => 'JIS 規格',
            'systems' => '塗料系統',
            'solvent_type' => '溶剤種別',
            'color' => '色相',
            'diluents' => '希釈剤',
            'content' => '容量',
            'mixing_ratio' => '混合比',
            'unit_price' => '塗料単価',
            'fire_laws_indication' => '消防法表示',
        ];
    }
}
