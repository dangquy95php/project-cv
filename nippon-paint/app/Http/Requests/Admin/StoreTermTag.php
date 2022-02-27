<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTermTag extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'slug' => "required|max:200|unique:term_tags,slug,{$this->get('id')}|regex:/^[a-z][a-z0-9\-]*/i",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'タグ名を入力してください',
            'name.max' => 'タグ名は255文字以内で入力してください',
            'slug.required' => 'スラッグを入力してください',
            'slug.max' => 'スラッグは200文字以内で入力してください',
            'slug.unique' => '登録済みのスラッグです',
            'slug.regex' => '有効なスラッグの形式ではありません',
        ];
    }
}
