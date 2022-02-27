<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class KeywordsRequest extends FormRequest
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
            //
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->filled('keywords')) {
            return '';
        }

        $keywords = preg_split('/[\p{Z}\p{Cc}]++/u', $this->keywords, -1, PREG_SPLIT_NO_EMPTY);

        $this->merge([
            'keywords' => $keywords
        ]);
    }
}
