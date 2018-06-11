<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserInsertRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ReviseRequest;
use Hash;
class UsersController extends Controller
{
    /**
     * 加载用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',5);
        $uname = $request -> input('username','');
        $data = User::where('username','like','%'.$uname.'%')->paginate($count);
        //加载用户列表页面
        return view('/Admin/users/index',['data'=>$data,'uname'=>$uname,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加用户页面
        return view('/Admin/users/create');
    }

    /**
     * 添加用户
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsertRequest $request)
    {

        $user = new User;
        // 检测是否有文件上传
        if($request -> hasFile('profile')){
            // 创建文件上传对象
            $profile = $request -> file('profile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/uploads/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            // dd($name);
            $profile -> move($dir_name,$temp_name);
            // dd($profile);
        }
        $user->username = $request -> input('username','');
        $user->password = Hash::make($request -> input('password',''));
        if(!isset($name)){
            $user->profile = '/Admin/uploads/1.jpg';
        }else{ 
            $name = trim($name,'.');
            $user->profile = $name;
        }
        $user->phone = $request -> input('phone','');
        $user->email = $request -> input('email','');
        $user->status = $request -> input('status',2);
        $res = $user->save();
        if($res){
            return redirect('/admin/users')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('/admin/users/edit',['data'=>$data]);
    }

    /**
     * 修改用户.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        // 检测是否有文件上传
        if($request -> hasFile('profile')){
            // 创建文件上传对象
            $profile = $request -> file('profile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/uploads/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile -> move($dir_name,$temp_name);
       }
       $user->username = $request -> input('username','');
       if(!isset($name)){
            $user->profile = $user->profile;
       }else{
            $name = trim($name,'.');
            $user->profile = $name;
       }
       $user->phone = $request -> input('phone','');
       $user->email = $request -> input('email','');
       $user->status = $request -> input('status','');
       $res = $user->save();
       if($res){
            return redirect('/admin/users')->with('success','修改成功');
       }else{
            return back()->with('error','修改失败');
       }
    }

    /**
     * 删除用户.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = User::destroy($id);
        if($res){
            return redirect('/admin/users')->with('success','删除成功');
       }else{
            return back()->with('error','删除失败');
       }
    }

    /**
    *   加载修改密码页面
    */
    public function upwd($id)
    {
        $data = User::find($id);
        return view('/Admin/users/pass',['data'=>$data]);
    }

    /**
    *   执行修改密码
    */
    public function revise(ReviseRequest $request,$id)
    {
        $user = User::find($id);
        // dump($user->password);
        $ypassword = $request->input('ypassword');
        $password = $request->input('password');
        $bool = Hash::check($ypassword, $user->password);
        if($bool){
            $ypassword = Hash::make($password);
            // dd($ypassword);
            $user->password = $ypassword;
            $res = $user->save();
            if($res){
                $value = $request->session()->flush();
                return redirect('/login')->with('success','修改成功请重新登录');
            }else{
                return back()->with('error','修改失败');
            }
        }else{
            return back()->with('error','原名密码错误');
        }
    }
}
