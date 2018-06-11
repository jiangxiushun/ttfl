<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User_home;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',5);
        $uname = $request -> input('username','');
        $data = User_home::where('username','like','%'.$uname.'%')->paginate($count);
        //加载用户列表页面
        return view('/Admin/user_home/index',['data'=>$data,'uname'=>$uname,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 加入黑名单.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User_home::find($id);
        $user -> status = 1;
        $res = $user -> save();
        if($res){
            return redirect('/home/users')->with('success','已加入黑名单');
        }else{
            return back()->with('error','加入黑名单失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User_home::find($id);
        return view('/Admin/user_home/edit',['data'=>$data]);
    }

    /**
     * 执行修改密码.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 接受传过来的数据
        $password = $request -> input('password');
        $repassword = $request -> input('repassword');
        if($password != $repassword){
            return back()->with('error','两次密码不一致');
        }
        // 获取修改密码用户的数据
        $user = User_home::find($id);
        $user -> password = Hash::make($password);
        $res = $user -> save();
        if($res){
            return redirect('/home/users')->with('success','修改成功!请尽快联系该用户');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 解除黑名单.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User_home::find($id);
        $user -> status = 0;
        $res = $user -> save();
        if($res){
            return redirect('/home/users')->with('success','解除成功');
        }else{
            return back()->with('error','解除失败');
        }
    }
}
