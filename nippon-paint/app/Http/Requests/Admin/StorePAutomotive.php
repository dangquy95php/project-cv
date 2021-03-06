<?php

namespace App\Http\Requests\Admin;

use App\Models\PAutomotive;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePAutomotive extends FormRequest
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
            'nks_no' => 'max:255',
            'nks_ver_no' => 'nullable|numeric',
            'status' => [
                'required',
                Rule::in(array_keys(PAutomotive::STATUS_LIST))
            ],
            'p_automotive_subcategory_id' => 'nullable|required_if:status,'.PAutomotive::TO_PUBLIC.'|exists:p_automotive_subcategories,id',
            'product_name' => [
                'required',
                'max:255',
                isset($this->p_automotive->id) ? "unique:p_automotives,product_name,{$this->p_automotive->id},id" : "unique:p_automotives,product_name",
            ],
            'product_name_kana' => 'required_if:status,'.PAutomotive::TO_PUBLIC.'|kana_for_search',
            'logo' => 'max:255',
            'image' => 'max:255',
            'labels' => 'array',
            'labels.*' => 'exists:p_automotive_labels,id',
            'description' => '',
            'feature' => 'required_if:status,'.PAutomotive::TO_PUBLIC,
            'classification' => 'nullable|required_if:status,'.PAutomotive::TO_PUBLIC.'|exists:p_automotive_classifications,id',
            'base_id' => 'exists:p_automotive_bases,id',
            'pack_type_id' => 'exists:p_automotive_pack_types,id',
            'regulations' => 'array',
            'regulations.*' => 'exists:p_automotive_regulations,id',
            'fire_laws_classifications' => 'array',
            'fire_laws_classifications.*' => 'exists:p_automotive_fire_law_classifications,id',
            'hardener_ratio' => 'nullable|exists:p_automotive_hardener_ratios,id',
            'applicable_clear_paints' => 'nullable|exists:p_automotives,id',
            'documents' => 'array',
            'documents.*.id' => 'exists:documents,id',
            'catalogs' => 'array',
            'catalogs.*.id' => 'exists:documents,id',
            'additional_related_pages' => 'array',
            'additional_related_pages.*.indication' => 'required|max:255',
            'additional_related_pages.*.url' => 'required|max:255|url',
            'additional_related_pages.*.type' => ['required', Rule::in(array_keys(PAutomotive::URL_TYPE_LIST))],
            'hardeners' => 'nullable|exists:p_automotives,id',
            'diluents' => 'nullable|exists:p_automotives,id',
        ];
    }

    public function messages()
    {
        return [
            'product_name_kana.kana_for_search' => '???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????',
            'nks_no.required_if' => '???????????????NKS???????????????????????????',
            'nks_ver_no.required_if' => '???????????????NKS???????????????????????????',
            'p_automotive_subcategory_id.required_if' => '????????????????????????????????????????????????',
            'product_name_kana.required_if' => '?????????????????????????????????????????????',
            'labels.required_if' => '???????????????????????????????????????',
            'classification.required_if' => '??????????????????????????????????????????',
            'feature.required_if' => '??????????????????????????????????????????',
            'base_id.required_if' => '?????????????????????/?????????????????????',
            'pack_type_id.required_if' => '???????????????1???/2??????????????????',
        ];
    }

    /*
     * ????????????????????????
     */
    protected function prepareForValidation()
    {
        $fields = [
            'labels',
            'fire_laws_classifications',
            'characteristics',
            'applicable_clear_paints',
            'hardeners',
            'diluents'
        ];

        $prepared = [];
        foreach ($fields as $field){
            $prepared[$field] = [];
            if($this->$field){
                $prepared[$field] = explode(',', $this->$field);
            }
        }
        $this->merge($prepared);

        $pages = [];
        if(!$this->additional_related_pages){
            $this->additional_related_pages = [];
        }
        foreach ($this->additional_related_pages as $page){
            if($page['indication'] || $page['url']){
                $pages[] = $page;
            }
        }
        $this->merge(['additional_related_pages' => $pages]);
        $this->merge(['documents' => json_decode($this->documents, true)]);
        $this->merge(['catalogs' => json_decode($this->catalogs, true)]);
    }

    protected function passedValidation()
    {
        // ?????????????????????????????????????????????????????????????????????????????????
        $fields = [
            'labels',
            'fire_laws_classifications'
        ];

        foreach ($fields as $field){
            if(is_array($this->$field)){
                $this->merge([$field => implode(',', $this->$field)]);
            }
        }

        // ??????????????????
        $documents = collect($this->documents)
            ->mapWithKeys(function ($doc) {
                return [$doc['id'] => ['sort' => $doc['sort']]];
            })->toArray();
        $this->merge(['documents' => $documents]);

        $catalogs = collect($this->catalogs)
            ->mapWithKeys(function ($doc) {
                return [$doc['id'] => ['sort' => $doc['sort']]];
            })->toArray();
        $this->merge(['catalogs' => $catalogs]);
    }

    public function attributes()
    {
        return [
            'nks_no' => 'NKS????????????',
            'nks_ver_no' => 'NKS????????????',
            'status' => '?????????????????????',
            'p_automotive_subcategory_id' => '??????????????????',
            'product_name' => '?????????',
            'product_name_kana' => '???????????????',
            'logo' => '????????????',
            'image' => '??????????????????',
            'labels' => '?????????',
            'description' => '????????????',
            'feature' => '??????',
            'classification' => '????????????',
            'base_id' => '??????/??????',
            'pack_type_id' => '1???/2???',
            'fire_laws_classifications' => '???????????????',
            'hardener_ratio' => '???????????????',
            'hardener_ratio_supplement' => '???????????????????????????',
            'content' => '??????',
            'color' => '??????',
            'mixing_ratio' => '?????????',
            'applicable_material' => '????????????',
            'applicable_clear_paints' => '??????????????????',
            'mixing_ratio_table' => '?????????',
            'drying_time' => '??????',
            'pot_life' => '??????????????????',
            'resin_specs' => '????????????',
            'free_area' => '????????????',
            'documents' => '??????',
            'diluents' => '?????????',
            'hardeners' => '?????????',
            'additional_related_pages' => '?????????????????????',
            'additional_related_pages.*.indication' => '?????????',
            'additional_related_pages.*.url' => '?????????',
            'additional_related_pages.*.type' => '??????',
        ];
    }
}
