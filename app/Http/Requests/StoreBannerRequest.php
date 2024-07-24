<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'title' => 'required',
            'albums' => 'required',
            'type' => 'required|gt:0',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề.',
            'albums.required' => 'Bạn chưa có albums cho sự kiện!',
            'type.gt' => 'Bạn chưa chọn vị trí banner.',
        ];
    }
}
