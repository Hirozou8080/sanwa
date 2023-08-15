<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'store_id' => ['required'],
      'name' => ['required', 'max:30'],
      'price' => ['required', 'numeric'],
      'detail' => ['max:250'],
    ];
  }

  public function messages()
  {
    return [
      'store_id.required' => '店舗IDが未設定です。',
      'name.required' => '商品名が入力されていません。',
      'name.max' => '店舗名は30文字未満で入力してください。',
      'price.required' => '金額が入力されていません。',
      'price.numeric' => '金額は数値のみで入力してください。',
      'detail.max' => '商品詳細は250文字以内で入力してください。',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    $res = response()->json(
      ['errors' => $validator->errors()],
      400
    );
    throw new HttpResponseException($res);
  }
}
