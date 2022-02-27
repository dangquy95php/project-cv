<?php

namespace App\Http\Requests\Admin;

use App\Models\PLargeSpec;
use App\Models\PLargeDiluent;
use App\Models\PLargeStandard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class StorePLargeSpec extends FormRequest
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
            'status' => 'required',
            'spec_number' => 'nullable|regex:/^[a-zA-Z0-9!-\/:-@¥[-`{-~]*$/',

            'general_name' => 'max:255',
            'documents' => 'array',
            'documents.*.id' => 'exists:documents,id',
            'instructions' => 'array',
            'instructions.*.id' => 'exists:documents,id',
            'section_ids' => [
                'nullable',
                'required_if:status,1',
                'array',
            ],
            'section_ids.*' => [
                Rule::in(array_keys(PLargeSpec::SECTIONS))
            ],
            'p_large_standard_id' => [
                'required_if:status,1',
                function($attribute, $value, $fail){
                    if($value !== '0'){
                        $standard = PLargeStandard::find($value);
                        if(!$standard){
                            return $fail('仕様規格の値が不正です。');
                        }
                    }
                }
            ],

            'processes' => 'array',
            'processes.*.p_large_spec_place_ids' => 'array',
            'processes.*.p_large_spec_place_ids.*' => 'exists:p_large_spec_places,id',
            'processes.*.process_name' => 'required',
            'processes.*.detail' => 'required_if:processes.*.field_type,2',
            'processes.*.p_large_id' => 'required_if:processes.*.field_type,1',
            'processes.*.usage' => 'required_if:processes.*.field_type,1',
            'processes.*.dried_time' => 'required_if:processes.*.field_type,1',
            'processes.*.p_large_spec_painting_method_ids' => 'array',
            'processes.*.p_large_spec_painting_method_ids.*' => 'exists:p_large_spec_painting_methods,id',
            'processes.*.p_large_spec_diluent_id' =>[
                'required_if:processes.*.field_type,1',
                function ($attribute, $value, $fail) {
                    if ($value !== '0' && !PLargeDiluent::find($value)) {
                        $fail('希釈剤の値が不正です。');
                    }
                },
            ],
            'processes.*.dilution_rate' => [
                function ($attribute, $value, $fail) {
                    if($this->input(substr($attribute, 0, strpos($attribute, 'dilution_rate')).'p_large_spec_diluent_id') && !$value){
                        $fail('希釈剤を選択した場合希釈率は必須です。');
                    }
                },
            ],
            'processes.*.film_thickness' => 'max:255',
            'processes.*.film_thickness_unit' => [
                'required_if:processes.*.field_type,1',
                Rule::in(array_keys(PLargeSpec::UNIT_LIST_LEN))
            ]
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     * @return array|string[]
     */
    public function attributes()
    {
        return [
            'status' => '公開ステータス',
            'spec_number' => '仕様番号',
            'name' => '仕様名',
            'general_name' => '一般名称',
            'document' => '資料',
            'instructions' => '製品使用説明書',
            'section_ids' => '塗装区分',
            'remark' => '備考',
            'processes.*.p_large_spec_place_ids' => '塗装場所',
            'processes.*.process_name' => '塗装工程名',
            'processes.*.field_type' => 'フィールドタイプ',
            'processes.*.detail' => '工程内容',
            'processes.*.p_large_id' => '製品ID',
            'processes.*.usage' => '使用量',
            'processes.*.dried_time' => '塗装間隔（23℃）',
            'processes.*.p_large_spec_painting_method_ids' => '塗装方法',
            'processes.*.p_large_spec_diluent_id' => '希釈剤',
            'processes.*.dilution_rate' => '希釈率',
            'processes.*.film_thickness' => '膜厚',
            'processes.*.film_thickness_unit' => '膜厚（単位）',
        ];

    }

    /**
     * エラーメッセージ設定
     * @return array|void
     */
    public function messages()
    {
        return [
            'section_ids.required_if' => ':attributeは必須です。',
            'section_ids.in' => ':attributeは必須です。',
            'processes.*.detail.required_if' => ':attributeは必須です。',
            'processes.*.p_large_spec_place_ids.required_if' => ':attributeは必須です。',
            'processes.*.p_large_id.required_if' => ':attributeは必須です。',
            'processes.*.usage.required_if' => ':attributeは必須です。',
            'processes.*.dried_time.required_if' => ':attributeは必須です。',
            'processes.*.p_large_spec_painting_method_ids.required_if' => ':attributeは必須です。',
            'processes.*.p_large_spec_diluent_id.required_if' => ':attributeは必須です。',
            'processes.*.dilution_rate.required_unless' => '希釈剤を選択した場合希釈率は必須です。',
            'processes.*.film_thickness_unit.required_if' => '単位もしくは「なし」を選択してください。',
            'processes.*.film_thickness_unit.in' => ':attributeの値が不正です。',
        ];
    }

    /**
     * バリデーション前処理
     */
    protected function prepareForValidation()
    {
        // フィールドを増やしていく系のフィールドで中身がない場合は空にしてしまう
        if ($this->processes) {
            $processes = [];
            foreach ($this->processes as $process) {
                // ソート順とフィールドタイプを除く配列が空かの判定
                $filtered = Arr::where(Arr::except($process, ['sort', 'field_type']), function ($value, $key) {
                   return !is_null($value);
                });
                if (!empty($filtered)) {
                    if(array_key_exists('p_large_spec_place_ids', $process)){
                        $process['p_large_spec_place_ids'] = $process['p_large_spec_place_ids'] ? explode(',', $process['p_large_spec_place_ids']) : [];
                    }
                    if(array_key_exists('p_large_spec_painting_method_ids', $process)){
                        $process['p_large_spec_painting_method_ids'] = $process['p_large_spec_painting_method_ids'] ? explode(',', $process['p_large_spec_painting_method_ids']):[];
                    }
                    $processes[] = $process;
                }
            }
            $this->merge(['processes' => $processes]);
        }
        $this->merge(['documents' => json_decode($this->documents, true)]);
        $this->merge(['instructions' => json_decode($this->instructions, true)]);
    }

    protected function passedValidation()
    {
        // ソートを追加
        $fields = [
            'documents',
            'instructions'
        ];
        foreach ($fields as $field){
            $documents = collect($this->$field)
                ->mapWithKeys(function ($doc) {
                    return [$doc['id'] => ['sort' => $doc['sort']]];
                })->toArray();
            $this->merge([$field => $documents]);
        }
    }
}
