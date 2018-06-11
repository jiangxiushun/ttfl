<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Cates;
use DB;

class ArticlesController extends Controller
{
    /**
     * 查看文章.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Articles::find($id);
        $rexiao = DB::table('goods')->where('status','2')->get();
        return view('/Home/articles/index',['data'=>$data,'rexiao'=>$rexiao]);
    }
}
