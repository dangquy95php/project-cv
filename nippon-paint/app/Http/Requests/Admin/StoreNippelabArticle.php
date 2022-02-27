<?php

namespace App\Http\Requests\Admin;

use App\Models\NippelabArticle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNippelabArticle extends FormRequest
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
            'status' => 'required|numeric',
            'title' => 'required|max:255',
            'publication_date' => 'nullable|date_format:Y/m/d H:i',
            'theme_id' => 'nullable|numeric',
            'category_id' => 'nullable|numeric',
            'slug' => [
                "nullable",
                isset($this->article->id) ? "unique:nippelab_articles,slug,{$this->article->id},id" : "unique:nippelab_articles,slug",
                "regex:/^[A-Za-z0-9_-]+$/"
            ],
            'og_image' => 'max:255',
        ];

        // 公開ステータスが「公開」のとき
        if ($this->input('status') == NippelabArticle::TO_PUBLIC) {
            $rules = array_merge($rules, [
                'publication_date' => 'required|date_format:Y/m/d H:i',
                'theme_id' => 'required|numeric',
                'category_id' => 'required|numeric',
                'slug' => [
                    "required",
                    isset($this->article->id) ? "unique:nippelab_articles,slug,{$this->article->id},id" : "unique:nippelab_articles,slug",
                    "regex:/^[A-Za-z0-9_-]+$/"
                ],
                'body' => 'required'
            ]);
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'status' => '公開ステータス',
            'publication_date' => '公開日時',
            'title' => 'タイトル',
            'theme_id' => 'テーマ',
            'category_id' => 'カテゴリ',
            'slug' => 'スラッグ',
            'meta_description' => 'meta description',
            'og_description' => 'og:description',
            'og_image' => 'og:image',
            'body' => '本文'
        ];
    }
}
