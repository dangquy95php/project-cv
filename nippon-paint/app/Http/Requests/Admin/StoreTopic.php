<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use App\Models\Topic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTopic extends FormRequest
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
        $rules = [
            'title' => 'required|max:255',
            'status' => 'required',
            'publication_date' => 'nullable|date_format:Y/m/d H:i',
            'thumbnail' => 'max:255',
        ];

        if ($this->input('status') == Topic::TO_PUBLIC) {
            $rules['article_category_id'] = 'required';
            $rules['publication_date'] = 'required|date_format:Y/m/d H:i';
            if(!$this->input('content') && !$this->input('redirect_url')){
                $rules['content'] = 'required';
                $rules['redirect_url'] = 'required';
                $rules['redirect_url_type'] = ['required', Rule::in(array_keys(Topic::URL_TYPE_LIST))];
            }
            if($this->input('redirect_url')){
                $rules['redirect_url'] = 'required|url';
                $rules['redirect_url_type'] = ['required', Rule::in(array_keys(Topic::URL_TYPE_LIST))];
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルが長すぎます',
            'status.required' => '公開ステータスを選択してください',
            'article_category_id.required' => '公開する場合、記事カテゴリは必須です',
            'publication_date.required' => '公開する場合、公開日時は必須です',
            'content.required' => '公開する場合、本文もしくはリンク先URL&種類のいずれかは必須です',
            'redirect_url.required' => '公開する場合、本文もしくはリンク先URL&種類のいずれかは必須です',
            'redirect_url_type.required' => '公開する場合、本文もしくはリンク先URL&種類のいずれかは必須です',
        ];
    }

    protected function passedValidation()
    {
        // バリデーション通ってから日時の形式を変換
        if($this->input('publication_date')){
            $publication_date = new Carbon($this->input('publication_date'));
            $this->merge(['publication_date' => $publication_date->format('Y-m-d H:i:s')]);
        }
    }

    public function attributes()
    {
        return [
            'redirect_url' => 'リンク先',
        ];
    }
}
