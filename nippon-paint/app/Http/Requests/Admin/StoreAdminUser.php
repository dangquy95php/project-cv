<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreAdminUser extends FormRequest
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
            'username' =>  empty($this->username_readonly) ? 'required|string|max:20|unique:admin_users,username' : '',
            'email' => empty($this->email_readonly) ? 'required|string|email|max:255' : '',
            'password' => empty($this->password_readonly) ? 'required|string|min:8|confirmed' : ''
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'role_type.required' => '役割を選択してください',
            'role_type.integer' => '役割の値が不正です',
            'username.required' => 'ユーザー名を入力してください',
            'username.string' => 'ユーザー名は半角英数字の文字列で入力してください',
            'username.max' => 'ユーザー名は20字以内で入力してください',
            'username.unique' => 'そのユーザー名はすでに使用されています',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスの形式に合わせて入力してください',
            'email.email' => 'メールアドレスの形式に合わせて入力してください',
            'email.max' => 'ユーザー名は255字以内で入力してください',
            'old_password.required' => '現在のパスワードを入力してください',
            'password.string' => 'パスワードは半角英数字の文字列で入力してください',
            'password.min' => 'パスワードは8字以上で入力してください',
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
