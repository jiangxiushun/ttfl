<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use DB;
class LoginController extends Controller
{
    /**
    *  登录
    */
    public  function dologin(Request $request)
    {
        //分配数据存入变量
        $username = $request -> input('username');
        // dd($username);
        $password = Hash::make($request -> input('password',''));
        $data = DB::table('user_admin')->where('username',$username)->where('password',$password)->get();
        dump($data);
    }
}
