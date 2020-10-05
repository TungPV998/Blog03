<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' =>'required|min:3',
            'password' =>'required|min:3',
            'telephone' =>'required|min:3|numeric',
            'email' =>'required|min:3|unique:users,email,'.$this->id,
            'address' =>'required|min:3',

        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Tên người dùng không được để trống',
            'name.min' =>'Tên người dùng không được nhỏ hơn 3 ký tự',
            'password.required' =>'Mật khẩu người dùng không được để trống',
            'password.min' =>'Mật khẩu người dùng không được nhỏ hơn 3 ký tự',
            'telephone.numeric' =>'Số điện thoại chỉ được là số',
            'telephone.required' =>'Số điện thoại không được để trống',
            'email.required' =>'Email không được để trống',
            'email.unique' =>'Email đã tồn tại',
            'address.required' =>'Địa chỉ không được để trống',
            'address.min' =>'Độ dài địa chỉ nhỏ nhất là 3 ký tự',
        ];
    }
}
