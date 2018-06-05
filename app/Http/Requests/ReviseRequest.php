<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReviseRequest extends Request
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
            'password' => 'required',
            'repassword' => 'required|same:password',
        ];
    }
    /**
    *   自定义错误信息
    */
    public function messages()
    {
        return [
            'password.required' => '密码必须填',
            'password.required' => '密码必须填',
            'repassword.required' => '确认密码必须填',
            'repassword.same' => '确认密码不一致',
        ];
    }
}
