<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Hash;
use DB;
class LoginController extends Controller
{
    /**
    *  登录
    */
    public  function dologin(Request $request)
    {
        // dd($request->all());
        //分配数据存入变量
        $code = $request -> input('Captcha');
        $res = self::check($code);
        if(!$res){
            return back()->with('error','验证码有误');
        }
        $username = $request -> input('username');
        $password = $request -> input('password');
        $user = User::where('username',$username)->first();
        if($user){
            $bool = Hash::check($password, $user->password);// 检测登录密码是否与数据库相同
            // dd($bool);
            if($bool){
                $request->session()->put('user', $user);// 将用户存入session
                // dd(session('user'));
                return redirect('/admin/index')->with('success','登陆成功');
            }else{
                return back()->with('error','登录失败');
            }
        }
        
    }

    /**
    *  退出登录 
    */
    public function loginout(Request $request)
    {  
        $request->session()->pull('user', 'user');
        return redirect('/login')->with('success','退出成功');
    }

    public static function check($code)
    {
        // 检测验证码有效性
        $session_code = session('code');
        if($session_code != $code){
            return false;
        }else{
            return true;
        }
    }
}
