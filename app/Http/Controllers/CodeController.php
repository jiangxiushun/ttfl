<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    /**
     * 加载验证码图像.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
