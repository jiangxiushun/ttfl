<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateInsertRequest extends Request
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
            'cname' => 'required|unique:cates',
        ];
    }
    /**
    *   自定义错误信息
    */
    public function messages()
    {
        return [
            'cname.required' => '类别必须填写',
            'cname.unique' => '类名已存在',
        ];
    }
}
