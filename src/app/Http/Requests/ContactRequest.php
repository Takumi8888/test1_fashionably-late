<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'gender'        => ['required'],
            'email'         => ['required', 'email'],
            'tel1'          => ['required', 'max_digits:5'],
            'tel2'          => ['required', 'max_digits:5'],
            'tel3'          => ['required', 'max_digits:5'],
            'address'       => ['required'],
            'category_id'   => 'prohibited_if:category_id,null',
            'detail'        => ['required', 'max:120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name'    => '名',
            'last_name'     => '姓',
            'gender'        => '性別',
            'email'         => 'メールアドレス',
            'tel1'          => '電話番号',
            'tel2'          => '電話番号',
            'tel3'          => '電話番号',
            'address'       => '住所',
            'category_id'   => 'お問い合わせの種類',
            'detail'        => 'お問い合わせ内容',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required'   => ':attributeを入力してください',
            'last_name.required'    => ':attributeを入力してください',
            'gender.required'       => ':attributeを選択してください',
            'email.required'        => ':attributeを入力してください',
            'email.email'           => ':attributeはメール形式で入力してください',
            'tel1.required'         => ':attributeを入力してください',
            'tel1.max_digits'       => ':attributeは5桁までの数字で入力してください',
            'tel2.required'         => ':attributeを入力してください',
            'tel2.max_digits'       => ':attributeは5桁までの数字で入力してください',
            'tel3.required'         => ':attributeを入力してください',
            'tel3.max_digits'       => ':attributeは5桁までの数字で入力してください',
            'address.required'      => ':attributeを入力してください',
            'prohibited_if'         => ':attributeを選択してください',
            'detail.required'       => ':attributeを入力してください',
            'detail.max'            => ':attributeは120文字以内で入力してください',
        ];
    }
}
