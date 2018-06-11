<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use DB;

class ListController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索
        $gname = $request -> input('gname','');
        $goods = Goods::where('gname','like','%'.$gname.'%')->where('status','!=','4')->paginate(15);
        return view('/Home/list/list',['goods'=>$goods]);
    }

    public function list($id)
    {
        // 声明一个数组
            $arr = [];
            // 查询所有的子类
            $arr_id = Cates::select('id')->where('path','like','%,'.$id.'%')->get();
            // dd($arr_id);
            // 转换指定格式
            foreach($arr_id as $v){
                $arr[] = $v->id;
            }
            // 加上本类
            $arr[] = $id;
            // dd($arr);
            // 查询数据    
            $goods = Goods::whereIn('cid',$arr)->where('status','!=','4')->paginate(15);
            return view('/Home/list/list',['goods'=>$goods]);

    }
}
