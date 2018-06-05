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
        $username = $request -> input('username');
        $password = $request -> input('password');
        
        $user = User::where('username',$username)->first();
        // dump($user);
        $bool = Hash::check($password, $user->password);// 检测登录密码是否与数据库相同
        if(!$bool){
            return back()->with('error','登录失败');
        }else{
            $request->session()->put('user', $user);// 将用户存入session
            return redirect('/admin/index')->with('success','登陆成功');
        }
    }

    /**
    *  退出登录 
    */
    public function loginout(Request $request)
    {  
        $request->session()->flush();
        return redirect('/login')->with('success','退出成功');
    }
}
