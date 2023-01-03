<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function messages(){
        return [
            "email.required"=>"Email không được để trống !",
            "email.email"=>"Email không hợp lệ !",
            "password.required"=>"Mật khẩu không được để trống !",
            "password.min"=>"Mật khẩu không được ít hơn 6 ký tự !",
            "password.max"=>"Mật khẩu không được nhiều hơn 50 ký tự !",
        ];

    }
    public function rules()
    {
        return [
            "email"=>"required|email",
            "password"=>"required|min:6|max:50"
            
        ];
    }
}
