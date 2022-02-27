<?php

namespace App\Http\Requests\Admin;

class StorePLargeSpecBridge extends StorePLargeSpec
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        $additional = [
            'name' => [
                "required",
                "max:255",
            ],
            'coated_matters' => 'required_if:status,1|array',
            'coated_matters.*' => 'exists:p_large_spec_bridge_coated_matters,id',
            'paint_points' => 'required_if:status,1|array',
            'paint_points.*' => 'exists:p_large_spec_bridge_paint_points,id',
        ];

        return array_merge($rules, $additional);
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     * @return array|string[]
     */
    public function attributes()
    {
        $attributes = parent::attributes();
        $additional = [
            'coated_matters' => '被塗物',
            'paint_points' => '塗装箇所',
        ];
        return array_merge($attributes, $additional);
    }

    /**
     * エラーメッセージ設定
     * @return array|void
     */
    public function messages()
    {
        $messages = parent::messages();
        $additional = [
            'section_id.required_if' => ':attributeは必須です。',
            'section_id.in' => ':attributeの値が不正です。',
            'coated_matters.required_if' => ':attributeは必須です。',
            'paint_points.required_if' => ':attributeは必須です。',
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
            'coated_matters',
            'paint_points',
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
