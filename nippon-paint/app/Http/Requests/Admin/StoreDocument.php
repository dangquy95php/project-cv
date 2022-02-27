<?php

namespace App\Http\Requests\Admin;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocument extends FormRequest
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
            'document_name' => [
                'required',
                'max:255',
                isset($this->document->id) ? "unique:documents,document_name,{$this->document->id},id" : "unique:documents,document_name",
            ],
            'document_name_kana' => 'required|max:255|kana_for_search',
            'document_file' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    $query = Document::where('document_file', $value);
                    if($this->document){
                        $query->where('id', '!=', $this->document->id);
                    }
                    $building_document= $query->first();
                    if($building_document){
                        return $fail($value.'は既に存在します。別の名前のファイルをアップしてください。');
                    }
                }
            ],
            'thumbnail' => 'max:255',
            'product_category_id' => 'required',
            'document_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => '公開ステータスは必須です',
            'document_name.required' => '資料名は必須です',
            'document_name.max' => '資料名が長すぎます',
            'document_name.unique' => 'その資料名はすでに使われています。',
            'document_name_kana.required' => '資料名（カナ）は必須です',
            'document_name_kana.max' => '資料名（カナ）が長すぎます',
            'document_name_kana.kana_first' => '先頭文字は　全角カナ か 半角数字　で入力してください。',
            'document_name_kana.kana_following' => '二文字目以降は 全角カナ か 半角英数字、記号　で入力してください。',
            'document_file.required' => '資料ファイルは必須です',
            'document_file.mimes' => '登録できるファイル形式はPDFのみです',
            'thumbnail.mimes' => '登録できるファイル形式はjpeg,png,gifのいずれかです',
            'product_category_id.required' => '製品カテゴリは必須です',
            'document_category_id.required' => '資料カテゴリは必須です',
        ];
    }
}
