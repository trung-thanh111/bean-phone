<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
            'product_id' => 'required|gt:0',
            'albums' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'product_id.gt' => 'Bạn chưa chọn mã sản phẩm.',
            'albums.required' => 'Bạn chưa chọn ảnh cho album.',
        ];
    }
}
