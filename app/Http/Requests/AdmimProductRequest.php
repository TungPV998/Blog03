<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmimProductRequest extends FormRequest
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
           'pro_name' =>'required|min:2',
           'unit_price' =>'required|numeric',
           'discount' =>'required',
           'quatity' =>'required',
           'pro_description' =>'required',
           'pro_content' =>'required',
           'pro_img' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
           'pro_multi_img.*' =>'image|mimes:jpg,jpeg,png,bmp|max:20000',
        ];
    }
    public function messages()
    {
        return [
            'pro_name.required' =>'Tên sản phẩm không được để trống',
            'pro_name.min' =>'Tên sản phẩm tối thiều là 2 ký tự',
            'unit_price.numeric' =>'Giá sản phẩm phải là số',
            'unit_price.required' =>'Giá sản phẩm không được để trống',
            'discount.required' =>'% giảm giá sản phẩm không được để trống',
            'quatity.required' =>'Số lượng sản phẩm không được để trống',
            'pro_description.required' =>'Mô tả sản phẩm không được để trống',
            'pro_content.required' =>'Nội dung sản phẩm không được để trống',
            'pro_img.image' =>'File upload chỉ được là file ảnh',
            'pro_multi_img.*.image' =>'File upload chỉ được là file ảnh',

        ];
    }
}
