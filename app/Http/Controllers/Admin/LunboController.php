<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lunbo;
class LunboController extends Controller
{
    /**
     * 加载显示模板
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lunbo::get();
        return view('/Admin/lunbos/index',['data'=>$data]);
    }

    /**
     * 加载添加模板.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Admin/lunbos/create');
    }

    /**
     * 执行上传操作.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lunbo = new Lunbo;
        // 检测图片一是否上传
        if($request -> hasFile('profile')){
            // 创建文件上传对象
            $profile = $request -> file('profile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/lunbo/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile -> move($dir_name,$temp_name);
        }

        if(!isset($name)){
            $lunbo->profile = '/Admin/lunbo/1.jpg';
        }else{ 
            $name = trim($name,'.');
            $lunbo->profile = $name;
        }
        $lunbo->link = $request->input('link','www.baidu.com');
        $res = $lunbo -> save();
        if($res){
            return redirect('/admin/lunbos')->with('success','添加成功');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lunbo::find($id);
        return view('/admin/lunbos/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lunbo = Lunbo::find($id);
        // 检测是否有文件上传
        if($request -> hasFile('profile')){
            // 创建文件上传对象
            $profile = $request -> file('profile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/lunbo/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile -> move($dir_name,$temp_name);
       }
       if(!isset($name)){
            $lunbo->profile = $lunbo->profile;
       }else{
            $name = trim($name,'.');
            $lunbo->profile = $name;
       }
        $lunbo->link = $request->input('link','www.baidu.com');
       $res = $lunbo->save();
       if($res){
            return redirect('/admin/lunbos')->with('success','修改成功');
       }else{
            return back()->with('error','修改失败');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Lunbo::destroy($id);
        if($res){
            return redirect('/admin/lunbos')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
