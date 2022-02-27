<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ContactLargeEstimation;
use App\Rules\Front\Kana;
use App\Rules\Front\Tel;
use App\Rules\Front\Zip;

class ContactLargeEstimationRequest extends FormRequest
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
            'target' => 'required|in:1,2',
            'fireproof_time' => 'required_if:target,1',
            'specification' => 'required_if:target,2',
            'area' => ['required_if:target,2, numeric'],
            'condition' => 'required_if:target,2',
            'construction_time' => 'required_if:target,2',
            'name' => 'required',
            'yomigana' => ['required', new Kana],
            'company' => 'required',
            'dept' => 'required',
            'sector' => [
                'required',
                Rule::in(array_keys(ContactLargeEstimation::$sectors))
            ],
            'email' => 'required|email',
            'postal_code' => ['required', new Zip],
            'pref' => 'exists:prefs,id',
            'address' => 'required',
            'phone' => ['required', new Tel],
            'inquiry' => 'required',
            'field_pref' => 'exists:prefs,id',
            'estimation_company' => 'required',
            'estimation_date' => 'required',
            'recaptcha_success' => ['required', 'accepted'],
            'recaptcha_score' => ['required', 'numeric', 'gte:0.5'],
        ];
    }

    public function attributes()
    {
        return [
            'target' => '対象',
            'fireproof_time' => '耐火時間',
            'specification' => '仕様名',
            'area' => '施工面積',
            'condition' => '足場条件',
            'construction_time' => '施工時間',
            'name' => '名前',
            'yomigana' => 'よみがな',
            'company' => '会社名',
            'dept' => '部署名',
            'sector' => '業種',
            'email' => 'eメール',
            'postal_code' => '郵便番号',
            'pref' => '都道府県',
            'address' => '市区町村・番地',
            'phone' => '電話番号',
            'inquiry' => '依頼内容',
            'field_pref' => '現場住所',
            'estimation_company' => '見積宛名',
            'estimation_date' => '見積日',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'required_if' => ':attributeを入力してください。',
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
