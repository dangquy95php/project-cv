<?php

namespace App\Http\Requests\Admin;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;

class StoreFaq extends FormRequest
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
            'question' => 'required|max:255',
            'published_status' => 'required',
        ];
        if ($this->input('published_status') == Faq::TO_PUBLIC) {
            $rules['answer'] = 'required';
            $rules['question_category_id'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'question.required' => '質問を入力してください',
            'question.max' => '質問が長すぎます',
            'published_status.required' => '公開ステータスを選択してください',
            'answer.required' => '公開する場合、回答は必須です',
            'question_category_id.required' => '公開する場合、質問カテゴリは必須です',
        ];
    }
}
