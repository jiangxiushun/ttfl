<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticlesRequest extends Request
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
            'title' => 'required',
            'author' => 'required',
            'editorValue' => 'required',
        ];
    }

    /**
    *   自定义错误信息
    */
    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'author.required' => '作者不能为空',
            'editorValue.required' => '内容不能为空',
        ];
    }
}
