<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreMyProfile extends FormRequest
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
            'role_type' =>  empty($this->role_type_readonly) ? 'required|integer' : '',
            'email' => empty($this->email_readonly) ? 'required|string|email|max:255' : '',
            'password' => empty($this->password_readonly) ? 'required|string|min:8|confirmed' : ''
        ];

        if (empty($this->password_readonly)) {
            $rules['old_password'] = [
                'required',
                function ($attribute, $value, $fail) {
                    if(!(Hash::check($value, \Auth::user()->password))) {
                        return $fail('現在のパスワードが一致しません');
                    }
                }
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'role_type.required' => '役割を選択してください',
            'role_type.integer' => '役割の値が不正です',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスの形式に合わせて入力してください',
            'email.email' => 'メールアドレスの形式に合わせて入力してください',
            'email.max' => 'ユーザー名は255字以内で入力してください',
            'old_password.required' => '現在のパスワードを入力してください',
            'password.required' => '新しいパスワード入力してください',
            'password.string' => '新しいパスワードは半角英数字の文字列で入力してください',
            'password.min' => '新しいパスワードは8字以上で入力してください',
            'password.confirmed' => '確認用のパスワードが一致しません',
        ];
    }

    protected function passedValidation()
    {
        if (empty($this->password_readonly)) {
            $this->merge([
                'password' => Hash::make($this->input('password'))
            ]);
        }
    }
}
