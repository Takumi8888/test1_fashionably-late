<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            'name'      => 'お名前',
            'email'     => 'メールアドレス',
            'password'  => 'パスワード'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => ':attributeを入力してください',
            'email.required'    => ':attributeを入力してください',
            'email.email'       => ':attributeは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => ':attributeを入力してください'
        ];
    }
}
