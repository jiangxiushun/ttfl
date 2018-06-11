<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Lunbo;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Articles;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lunbo = Lunbo::get();
        $rexiao = DB::table('goods')->where('status','2')->get();
        $goods = Goods::where('status','!=','4')->paginate(6);
        $articles = Articles::get();
        return view('/Home/index',['lunbo'=>$lunbo,'rexiao'=>$rexiao,'goods'=>$goods,'articles'=>$articles]);
    }
}
