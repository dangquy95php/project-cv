<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Front\Tel;

class ContactToughGuardCatalogRequest extends FormRequest
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
            'company' => 'required',
            'dept' => 'required',
            'phone' => ['required', new Tel],
            'recaptcha_success' => ['required', 'accepted'],
            'recaptcha_score' => ['required', 'numeric', 'gte:0.5'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'company' => '会社名',
            'dept' => '部署名',
            'phone' => '電話番号',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
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
            return url('/contact/tough-guard-catalog/transmission_error');
        }
    }
}
