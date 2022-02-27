<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class PBuildingSearchRequest extends FormRequest
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
        return [];
    }

    protected function prepareForValidation()
    {
        if($this->has('child_category') && !is_array($this->child_category)){
            $this->merge(['child_category' => [$this->child_category]]);
        }
    }
}
