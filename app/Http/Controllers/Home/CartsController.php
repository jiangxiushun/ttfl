<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;;
use App\Models\Carts;

class CartsController extends Controller
{
    /**
    *  我的购物车
    */
    public function getWdgwc()
    {
        // 获取 数据
        $good_crte = Carts::where('uid',session('home_user')->id)->get();
        $arr = [];

        foreach($good_crte as $k=>$v){

        }
        // 加载模板
        return view('/Home/carts/carts',['good_crte'=>$good_crte]);
    }

    /**
    *   加入购物车
    */
    public function getJrgwc(Request $request,$id)
    {
       $arr = Carts::where('uid',$request->get('uid'))->where('gid',$id)->first();
       // echo $arr;
       if($arr){
            $data = Carts::find($arr->id);
            $data -> num = $arr->num+$request->num;
            $res = $data -> save();
            // echo $res;
            if($res){
                 echo '1';
            }else{
                 echo '2';
            }
       }else{
           $data = new Carts;
           $data -> uid = $request->get('uid');
           $data -> gid = $id;
           $data -> num = $request->get('num');
           $res = $data -> save();
           if($res){
                echo '1';
           }else{
                echo '2';
           }
       } 
    }

    /**
    *   减一
    */
    public function postJian()
    {
        echo '11111';
    }
}
