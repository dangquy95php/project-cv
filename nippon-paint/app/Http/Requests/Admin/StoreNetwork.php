<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Network;
use App\Rules\Admin\Tel;
use App\Rules\Admin\Zip;

class StoreNetwork extends FormRequest
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
            'name' => 'required|max:255',
            'status' => 'required|numeric'
        ];

        if ($this->input('status') != Network::TO_DRAFT) {
            $rules = array_merge($rules, [
                'building_type' => 'required|numeric',
                'zip' => ['required', new Zip],
                'pref_id' => 'required|numeric',
                'city' => 'required|max:255',
                'block' => 'required|max:255',
                'building' => 'max:255',
                'tel' => ['required', 'max:255', new Tel],
                'fax' => ['required', 'max:255', new Tel],
                'googlemap' => 'required|url',
            ]);
        }

        return $rules;
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'building_type' => '建物種別',
            'name' => '名前',
            'zip' => '郵便番号',
            'pref_id' => '都道府県',
            'city' => '市区町村',
            'block' => '番地',
            'building' => 'ビル名・建物名',
            'tel' => 'TEL',
            'fax' => 'FAX',
            'googlemap' => 'GoogleMap',
            'status' => '公開ステータス'
        ];
    }
}
