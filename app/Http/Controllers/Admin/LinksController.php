<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Links;
class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',5);
        $title = $request -> input('title','');
        $data = Links::where('title','like','%'.$title.'%')->paginate($count);
        //加载用户列表页面
        return view('/Admin/links/index',['data'=>$data,'title'=>$title,'count'=>$count]);
    }

    /**
     * 加载添加页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Admin/links/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $links = new Links;
        // 检测图片一是否上传
        if($request -> hasFile('profile')){
            // 创建文件上传对象
            $profile = $request -> file('profile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/links/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile -> move($dir_name,$temp_name);
        }

        if(!isset($name)){
            $links->profile = '/Admin/links/1.jpg';
        }else{ 
            $name = trim($name,'.');
            $links->profile = $name;
        }
        $links->link = $request->input('link','www.baidu.com');
        $links -> title = $request->input('title');
        $res = $links -> save();
        if($res){
            return redirect('/admin/link')->with('success','添加成功');
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
     * 加载修改页面.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Links::find($id);
        return view('/Admin/links/edit',['data'=>$data]);
    }

    /**
     * 修改操作.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $links = links::find($id);
        // 检测是否有文件上传
        if($request -> hasFile('profile')){
            // 创建文件上传对象
            $profile = $request -> file('profile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/links/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile -> move($dir_name,$temp_name);
        }
        if(!isset($name)){
            $links->profile = $links->profile;
        }else{
            $name = trim($name,'.');
            $links->profile = $name;
        }
        $links->title = $request->input('title'); 
        $links->link = $request->input('link','www.baidu.com');
        $res = $links->save();
        if($res){
            return redirect('/admin/link')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除操作.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Links::destroy($id);
        if($res){
            return redirect('/admin/link')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
