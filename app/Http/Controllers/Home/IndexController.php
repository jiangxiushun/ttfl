<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lunbo;
use App\Models\Cates;
use App\Models\Links;
use App\Models\Goods;
use App\Models\Articles;

class IndexController extends Controller
{
    public static function cates($pid = 0)
    {
        $arr = [];
        $cates = Cates::where('pid',$pid)->get();
        foreach($cates as $k=>$v){
            $v['sub'] = self::cates($v->id);
            $arr[] = $v;
        }
        return $arr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cates = $this->cates(0);
        $lunbo = Lunbo::get();
        $links = Links::get();
        $goods = Goods::paginate(6);
        $articles = Articles::get();
        return view('/Home/index',['lunbo'=>$lunbo,'cates'=>$cates,'links'=>$links,'goods'=>$goods,'articles'=>$articles]);
    }
}
