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
    public function rules()
    {
        return [

            'password' =>'required|min:3',
            'email' =>'required|min:3|email',
        ];
    }
    public function messages()
    {
        return [
            'password.required' =>'Mật khẩu người dùng không được để trống',
            'password.min' =>'Mật khẩu người dùng không được nhỏ hơn 3 ký tự',
            'email.required' =>'Email không được để trống',
            'email.min' =>'Email người dùng không được nhỏ hơn 3 ký tự',
            'email.email' =>'Email người dùng không đúng định dạng',
        ];
    }
}
