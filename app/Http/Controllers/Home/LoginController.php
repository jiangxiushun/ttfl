<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User_home;
use Hash;

class LoginController extends Controller
{
    /**
     * 加载登录页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('/Home/login/login');
    }
    /**
    *	执行登录
    */
    public function postDologin(Request $request)
    {
    	$code = $request -> input('Captcha');
        $res = self::check($code);
        if(!$res){
            return back()->with('error','验证码有误');
        }
        $username = $request -> input('username');
        $password = $request -> input('password');
        $user = User_home::where('username',$username)->first();
        // dd($user);
        if($user -> status == 1){
            return back()->with('error','你已经被拉入了黑名单,如果有疑问请打客服');
        }
        if($user){
            $bool = Hash::check($password, $user->password);// 检测登录密码是否与数据库相同
            // dd($bool);
            if($bool){
                $request->session()->put('home_user', $user);// 将用户存入session
                return redirect('/')->with('success','登陆成功');
            }else{
                return back()->with('error','登录失败');
            }
        }
    }

    /**
    *	执行退出登录
    */
    public function getLogout(Request $request)
    {
    	$request->session()->pull('home_user', 'home_user');
    	return redirect('/')->with('success','退出成功');
    }
    /**
    *	验证验证码是否有效
    */
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
