<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'post_catalogue_id' => 'required|gt:0',
            'user_id' => 'required|gt:0',
        ];
    }
    // custom thông báo lỗi 
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tên bài viết.',
            'title.unique' => 'Bài viết đa tồn tại!',
            'content.required' => 'Bạn chưa có nội dung bài viết',
            'post_catalogue_id.gt' => 'Bạn chưa chọn danh mục cho bài viết',
            'user_id.gt' => 'Bạn chưa chọn tác giả của bài viết',
        ];
    }
}
