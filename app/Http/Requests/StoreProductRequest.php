<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|unique:products,title',
            'color' => 'required',
            'price' => 'required',
            'product_catalogue_id' => 'required|gt:0',
            'brand_id' => 'required|gt:0',
        ];
    }
    // custom thông báo lỗi 
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tên sản phẩm.',
            'title.unique' => 'Sản phẩm đã tồn tại!',
            'color.required' => 'Bạn chưa nhập màu sắc.',
            'price.required' => 'Bạn chưa nhập giá của sản phẩm.',
            'product_catalogue_id.gt' => 'Bạn chưa chọn danh mục sản phẩm',
            'brand_id.gt' => 'Bạn chưa chọn brand cho sản phẩm',
        ];
    }
}
