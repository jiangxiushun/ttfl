<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodInsertRequest;
use App\Http\Requests\GoodUpdateRequest;
use App\Models\Cates;
use App\Models\Goods;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',5);
        $gname = $request -> input('gname','');
        $data = Goods::where('gname','like','%'.$gname.'%')->paginate($count);
        //加载用户列表页面
        return view('/Admin/goods/index',['data'=>$data,'gname'=>$gname,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Admin/goods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodInsertRequest $request)
    {
        $goods = new Goods;
        //检测第一张图片是否上传
        if($request -> hasFile('profile1')){
            // 创建文件上传对象
            $profile1 = $request -> file('profile1');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile1 ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/goods/'.date('Ymd',time());
            $name1 = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile1 -> move($dir_name,$temp_name);
        }
        if(!isset($name1)){
            $goods->profile1 = '/Admin/goods/1.jpg';
        }else{ 
            $name1 = trim($name1,'.');
            $goods->profile1 = $name1;
        }
        //检测第二张图片是否上传
        if($request -> hasFile('profile2')){
            // 创建文件上传对象
            $profile2 = $request -> file('profile2');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile2 ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/goods/'.date('Ymd',time());
            $name2 = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile2 -> move($dir_name,$temp_name);
        }
        if(!isset($name2)){
            $goods->profile2 = '/Admin/goods/1.jpg';
        }else{ 
            $name2 = trim($name2,'.');
            $goods->profile2 = $name2;
        }
        //插入数据
        $goods->cid = $request->input('cid');
        $goods->gname = $request -> input('gname'); // 商品名
        $goods->status = $request -> input('status'); // 商品状态
        $goods->stock = $request -> input('stock'); // 商品库存
        $goods->price = $request -> input('price'); // 商品价格
        $goods->content = $request -> input('editorValue');// 商品描述
        $res = $goods -> save();
        if($res){
            return redirect('/admin/good')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 显示详情.
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

        //加载修改页面
        $data = Goods::find($id);
        return view('/Admin/goods/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodUpdateRequest $request, $id)
    {
        // dd($request -> input('status'));
        $goods = Goods::find($id);
        //检测第一张图片是否上传
        if($request -> hasFile('profile1')){
            // 创建文件上传对象
            $profile1 = $request -> file('profile1');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile1 ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/goods/'.date('Ymd',time());
            $name1 = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile1 -> move($dir_name,$temp_name);
        }
        if(!isset($name1)){
            $goods->profile1 = $goods->profile1;
        }else{ 
            $name1 = trim($name1,'.');
            $goods->profile1 = $name1;
        }
        //检测第二张图片是否上传
        if($request -> hasFile('profile2')){
            // 创建文件上传对象
            $profile2 = $request -> file('profile2');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $profile2 ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            $dir_name = './Admin/goods/'.date('Ymd',time());
            $name2 = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $profile2 -> move($dir_name,$temp_name);
        }
        if(!isset($name2)){
            $goods->profile2 = $goods->profile2;
        }else{ 
            $name2 = trim($name2,'.');
            $goods->profile2 = $name2;
        }
        //插入数据
        $goods->cid = $request->input('cid'); //商品分类
        $goods->gname = $request -> input('gname'); // 商品名
        $goods->status = $request -> input('status'); // 商品状态
        $goods->stock = $request -> input('stock'); // 商品库存
        $goods->price = $request -> input('price'); // 商品价格
        $goods->content = $request -> input('editorValue');// 商品描述
        $res = $goods -> save();
        if($res){
            return redirect('/admin/good')->with('success','修改成功');
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
        //删除数据
        $res = Goods::destroy($id);
        if($res){
            return redirect('/admin/good')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
