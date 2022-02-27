<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionCategory extends FormRequest
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
            'category_name' => 'required',
            'parent_category_id' => 'required',
            'slug' => [
                "required",
                isset($this->category->id) ? "unique:question_categories,slug,{$this->category->id},id" : "unique:question_categories,slug",
                "regex:/^[A-Za-z0-9_-]+$/"
            ],
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => '中カテゴリ',
            'parent_category_id' => '大カテゴリ',
            'slug' => 'スラッグ'
        ];
    }
}
