<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSliderRequest extends FormRequest
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
            'description' =>'required',
            'slide_img' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Tên slide không được để trống',
            'description.required' =>'Mô tả slide không được để trống',
            'slide_img.image' =>'File upload chỉ được là file ảnh',
            'slide_img.required' =>'File upload ảnh đại diện không được để trống !!!',
        ];
    }
}
