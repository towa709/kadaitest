<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

  public function authorize(): bool
  {
    return true;
  }
  public function rules(): array
  {
    return [
      'last_name' => 'required',
      'first_name' => 'required',
      'gender' => 'required',
      'email' => 'required|email',
      'tel1' => 'required|numeric|digits_between:1,5',
      'tel2' => 'required|numeric|digits_between:1,5',
      'tel3' => 'required|numeric|digits_between:1,5',
      'address' => 'required',
      'category_id' => 'required|integer|exists:categories,id',
      'detail' => 'required|string|max:120',
    ];
  }

  public function messages(): array
  {
    return [
      'last_name.required' => '姓を入力してください',
      'first_name.required' => '名を入力してください',
      'gender.required' => '性別を選択してください',
      'email.required' => 'メールアドレスを入力してください',
      'email.email' => 'メールアドレスはメール形式で入力してください',
      'tel1.required' => '電話番号を入力してください',
      'tel.numeric' => '電話番号は5桁までの数字で入力してください',
      'address.required' => '住所を入力してください',
      'category_id.required' => 'お問い合わせの種類を選択してください',
      'category_id.exists' => '正しいお問い合わせの種類を選択してください',
      'detail.required' => 'お問い合わせ内容を入力してください',
      'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
    ];
  }
}
