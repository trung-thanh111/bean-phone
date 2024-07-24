<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'user_catalogue_id' => 'required|gt:0',
        ];
    }
    // custom thông báo lỗi 
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thành viên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không đúng định dạng. vd:user123@gmail.com',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên',
        ];
    }
}
