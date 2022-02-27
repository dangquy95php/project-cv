<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StorePLargeStandard extends FormRequest
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
            'p_large_standard_category_id' => 'required|numeric',
            'standard_name' => 'required|max:255',
            'slug' => [
                'required',
                'max:255',
                isset($this->p_large_standard->id) ? "unique:p_large_standards,slug,{$this->p_large_standard->id},id" : "unique:p_large_standards,slug",
                "regex:/^[A-Za-z0-9_-]+$/",
            ],
            'products' => 'array',
            'products.*.general_name' => 'required|max:255',
            'products.*.p_large_id' => 'required|exists:p_larges,id',
            'products.*.general_standard_number' => 'max:255',
        ];
    }

    /*
     * バリデーション前
     */
    protected function prepareForValidation()
    {
        $products = [];
        if(!$this->products){
            $this->products = [];
        }
        foreach ($this->products as $product){
            if($product['general_name'] || $product['p_large_id'] || $product['general_standard_number']){
                $products[] = $product;
            }
        }
        $this->merge(['products' => $products]);
    }

    public function attributes()
    {
        return [
            'p_large_standard_category_id' => 'カテゴリ',
            'standard_name' => '規格名',
            'slug' => 'スラッグ',
            'products' => '製品登録',
            'products.*.general_name' => '一般名称',
            'products.*.p_large_id' => '製品',
            'products.*.general_standard_number' => '規格番号',
        ];
    }
}
