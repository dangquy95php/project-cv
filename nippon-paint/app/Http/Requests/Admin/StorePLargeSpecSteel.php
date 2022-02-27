<?php

namespace App\Http\Requests\Admin;

class StorePLargeSpecSteel extends StorePLargeSpec
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        $additional =  [
            'name' => [
                "required",
                "max:255",
            ],
            'features' => 'required_if:status,1|array',
            'features.*' => 'exists:p_large_spec_steel_features,id',
            'systems' => 'required_if:status,1|array',
            'systems.*' => 'exists:p_large_spec_steel_systems,id',
            'solvent_types' => 'required_if:status,1|array',
            'solvent_types.*' => 'exists:p_large_spec_steel_solvent_types,id',
            'points' => 'required_if:status,1|array',
            'points.*' => 'exists:p_large_spec_steel_points,id',
        ];
        return array_merge($rules, $additional);
    }

    public function attributes()
    {
        $attributes = parent::attributes();
        $additional = [
            'features' => '特徴',
            'systems' => '塗料系統',
            'solvent_types' => '溶剤種別',
            'points' => '適用部位',
        ];
        return array_merge($attributes, $additional);
    }

    /**
     * エラーメッセージ設定
     * @return string[]
     */
    public function messages()
    {
        $messages = parent::messages();
        $additional = [
            'features.required_if' => ':attributeは必須です。',
            'systems.required_if' => ':attributeは必須です。',
            'solvent_types.required_if' => ':attributeは必須です。',
            'points.required_if' => ':attributeは必須です。',
        ];
        return array_merge($messages, $additional);
    }

    /**
     * バリデーション前処理
     */
    protected function prepareForValidation()
    {
        parent::prepareForValidation();
        $fields = [
            'features',
            'systems',
            'solvent_types',
            'points'
        ];

        $prepared = [];
        foreach ($fields as $field) {
            $prepared[$field] = [];
            if ($this->$field) {
                $prepared[$field] = explode(',', $this->$field);
            }
        }
        $this->merge($prepared);
    }
}
