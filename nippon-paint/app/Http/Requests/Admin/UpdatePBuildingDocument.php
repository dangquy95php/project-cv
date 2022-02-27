<?php

namespace App\Http\Requests\Admin;

use App\Models\PBuildingDocument;

class UpdatePBuildingDocument extends StorePBuildingDocument
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = parent::rules();
        $rule['document_file'] = [
            'mimes:pdf',
            function($attribute, $value, $fail) {
                $filename = $value->getClientOriginalName();
                $building_document = PBuildingDocument::where('document_file', $filename)->first();
                if($building_document && $building_document->id !== $this->route('building_document')->id){
                    return $fail($filename.'は既に存在します。別の名前のファイルをアップしてください。');
                }
            }
        ];
        return $rule;
    }
}
