<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ContactColorSample;
use App\Rules\Front\Kana;
use App\Rules\Front\Tel;
use App\Rules\Front\Zip;

class ContactColorSampleRequest extends FormRequest
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
                Rule::in(array_keys(ContactColorSample::$sectors))
            ],
            'email' => 'required|email',
            'postal_code' => ['required', new Zip],
            'pref' => 'exists:prefs,id',
            'address' => 'required',
            'phone' => ['required', new Tel],
            'pro_journal_checkbox' => 'array',
            'pro_journal_checkbox.*' => Rule::in(array_keys(ContactColorSample::$pro_journals)),
            'homepage_checkbox' => 'array',
            'homepage_checkbox.*' => Rule::in(array_keys(ContactColorSample::$homepages)),
            'other_checkbox' => 'array',
            'other_checkbox.*' => Rule::in(array_keys(ContactColorSample::$others)),
            'construction_checkbox' => 'array',
            'construction_checkbox.*' => Rule::in(array_keys(ContactColorSample::$constructions)),
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
            'pro_journal_checkbox.*' => '専門誌',
            'homepage_checkbox.*' => 'ホームページ',
            'other_checkbox.*' => '上記以外の方法',
            'construction_checkbox.*' => '主な工事内容',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'in' => ':attributeの値が不正です。',
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
