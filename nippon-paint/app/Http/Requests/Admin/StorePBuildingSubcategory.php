<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePBuildingSubcategory extends FormRequest
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
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
            'slug' => [
                "required",
                isset($this->building_subcategory->id) ? "unique:p_building_subcategories,slug,{$this->building_subcategory->id},id" : "unique:p_building_subcategories,slug",
                "regex:/^[A-Za-z0-9_-]+$/"
            ],
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => '小カテゴリ',
            'parent_id' => '中カテゴリ',
            'slug' => 'スラッグ'
        ];
    }
}
