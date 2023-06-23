<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email|string|max:191',
            'password' => 'required|string|between:8,191',
            'confirmpassword' => 'required|string|between:8,191',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を191文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを191文字以下で入力してください',
            'email.unique' => 'このメールアドレスは既に使用されているので別のメールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.string' => 'パスワードを文字列で入力してください',
            'password.between' => 'パスワードを8文字以上191文字以下で入力してください',
            'confirmpassword.required' => '確認用パスワードを入力してください',
            'confirmpassword.string' => '確認用パスワードを文字列で入力してください',
            'confirmpassword.between' => '確認用パスワードを8文字以上191文字以下で入力してください',
        ];
    }
}
