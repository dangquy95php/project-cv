<?php

namespace App\Http\Requests\Admin;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;

class StoreFaqPickup extends FormRequest
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
            'pickup_ids.*' => 'array|max:5',
            'pickup_ids.*.id' => 'exists:faqs,id',
        ];
        return $rules;
    }

    /*
     * バリデーション前
     */
    protected function prepareForValidation()
    {
        $pickup_ids = [];
        foreach ($this->pickup_ids as $catId => $catPickupIds) {
            $pickup_ids[$catId] = json_decode($catPickupIds , true);
            if (empty($pickup_ids[$catId])) {
                $pickup_ids[$catId] = [];//空文字は空配列にする
            }
        }
        $this->merge(['pickup_ids' => $pickup_ids]);
    }

    public function messages()
    {
        return [
            'pickup_ids.*.max' => 'ピックアップできる質問は5個までです。',
            'pickup_ids.*.id.exists' => '存在しない質問が選択されています。',
        ];
    }
}
