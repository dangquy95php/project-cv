<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ContactProducts;
use App\Rules\Front\Tel;
use App\Rules\Front\Zip;
use App\Rules\Front\Kana;

class ContactProductsRequest extends FormRequest
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
            'name' => 'required',
            'yomigana' => ['required', new Kana],
            'sector' => [
                'required',
                Rule::in(array_keys(ContactProducts::$sectors))
            ],
            'email' => 'required|email',
            'postal_code' => ['required', new Zip],
            'pref' => 'exists:prefs,id',
            'address' => 'required',
            'phone' => ['required', new Tel],
            'inquiry' => 'required|in:1,2,3',
            'inquiry_body' => 'required',
            'recaptcha_success' => ['required', 'accepted'],
            'recaptcha_score'   => ['required', 'numeric', 'gte:0.5'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'yomigana' => 'よみがな',
            'sector' => '業種',
            'email' => 'eメール',
            'postal_code' => '郵便番号',
            'pref' => '都道府県',
            'address' => '市区町村・番地',
            'phone' => '電話番号',
            'inquiry' => 'お問い合わせ内容',
            'inquiry_body' => '具体的な内容',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'in' => ':attributeを選択してください。',
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
