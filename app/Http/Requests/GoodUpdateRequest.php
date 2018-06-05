<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodUpdateRequest extends Request
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
            'gname' => 'required',
            'cid' => 'required',
            'price' => 'required',
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
            'cid.required' => '必须选择类别',
            'price.required' => '价格必须填',
            'status.required' => '状态必须给',
        ];
    }
}
