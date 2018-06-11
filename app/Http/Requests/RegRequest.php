<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegRequest extends Request
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
            'username' => 'required|unique:user_admin|regex:/^[a-zA-Z0-9_-]{4,16}$/',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'email' => 'required|email',
        ];
    }

    /**
    *   自定义错误信息
    */
    public function messages()
    {
        return [
            'username.required' => '用户名必填',
            'username.unique' => '用户名已存在',
            'username.regex' => '用户名格式不正确',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式不对',
            'password.required' => '密码必填',
            'password.regex' => '密码格式不正确',
            'repassword.required' => '确认密码必填',
            'repassword.same' => '两个密码不一致',
        ];
    }
}
