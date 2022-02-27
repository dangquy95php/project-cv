<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Front\Kana;
use App\Rules\Front\Tel;
use App\Rules\Front\Zip;

class ContactNaxecubeConceptbookRequest extends FormRequest
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
            'company' => 'required',
            'name' => 'required',
            'yomigana' => ['required', new Kana],
            'email' => 'required|email',
            'postal_code' => ['required', new Zip],
            'pref' => 'exists:prefs,id',
            'address' => 'required',
            'phone' => ['required', new Tel],
            'description' => 'required|in:1,2',
            'recaptcha_success' => ['required', 'accepted'],
            'recaptcha_score'   => ['required', 'numeric', 'gte:0.5'],
        ];
    }

    public function attributes()
    {
        return [
            'company' => '会社名',
            'name' => '氏名',
            'yomigana' => 'よみがな',
            'email' => 'メールアドレス',
            'postal_code' => '郵便番号',
            'pref' => '都道府県',
            'address' => '市区町村・番地',
            'phone' => '電話番号',
            'description' => '詳しい説明',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'email' => '半角で正しい入力形式で入力してください。',
        ];
    }

    protected function prepareForValidation()
    {
        $response = no_captcha()->verify($this->{'g-recaptcha-response'});

        $this->merge([
            'recaptcha_success' => $response->isSuccess(),
            'recaptcha_score' => $response->getScore()
        ]);
    }

    protected function getRedirectUrl()
    {
        $failed = $this->validator->failed();

        if (isset($failed['recaptcha_success']) || isset($failed['recaptcha_score'])) {
            return url('/contact/products/transmission_error');
        }
    }
}
