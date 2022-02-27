<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnicalTerm extends FormRequest
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
            'title' => 'required',
            'title_kana' => 'required|kana_first|kana_following',
            'status' => 'required',
            'term_tag_ids' => 'array',
            'term_tag_ids.*' => 'exists:term_tags,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['term_tag_ids' => $this->term_tag_ids ? explode(',', $this->term_tag_ids) : []]);
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title_kana.required' => 'タイトル（カナ）を入力してください',
            'title_kana.kana_first' => '先頭文字は　全角カナ か 半角数字　で入力してください。',
            'title_kana.kana_following' => '二文字目以降は 全角カナ か 半角英数字、記号　で入力してください。',
            'status.required' => '公開ステータスを選択してください',
            'term_tag_ids.*.exists' => '選択されたタグは存在しません'
        ];
    }
}
