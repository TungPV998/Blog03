<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtributeRequest extends FormRequest
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
            'attr_name' =>'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'attr_name.required' =>'Tên thuộc tính không được để trống !!!',
        ];
    }
}
