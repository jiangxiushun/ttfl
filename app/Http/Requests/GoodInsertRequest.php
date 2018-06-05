<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodInsertRequest extends Request
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
            'gname' => 'required|unique:goods',
            'cid' => 'required',
            'price' => 'required',
            'profile1'=>'required',
            'editorValue' => 'required',
            'status'=>'required',
        ];
    }
    /*
    *   自定义错误信息
    */
    public function messages()
    {
        return [
            'gname.required' => '商品名必填',
            'gname.unique' => '商品已存在',
            'cid.required' => '必须选择类别',
            'price.required' => '价格必须填',
            'profile1.required' => '商品图片至少有一个',
            'editorValue.required' => '商品描述必须填写',
            'status.required' => '状态必须给',
        ];
    }
}
