<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegRequest;
use App\Http\Controllers\Controller;
use App\Models\User_home;
use Hash;

class RegisterController extends Controller
{
    /**
     * 加载注册页.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('/home/reg/reg');
    }

    /**
     * 添加操作.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(RegRequest $request)
    {
        $huser = new User_home;
        $username = $request->input('username');
        $pass = $request->input('password');
        $email = $request->input('email');
        $huser -> username = $username;
        $huser -> password = Hash::make($pass);
        $huser -> email = $email;
        $res = $huser -> save();
        if($res){
            return redirect('/home/login')->with('success','注册成功');
        }else{
            return back()->with('error','注册失败');
        }
    }

    /**
    *   检测用户名是否存在
    */
    public function getUsername(Request $request)
    {
        $username = $request->input('username');
        $res = User_home::where('username',$username)->first();
        if($res){
            echo '1';
        }else{
            echo '2';
        }
    }

    /**
    *   检测邮箱是否存在
    */
    public function getEmail(Request $request)
    {
        $email = $request->input('email');
        $res = User_home::where('email',$email)->first();
        if($res){
            echo '1';
        }else{
            echo '2';
        }
    }
}
