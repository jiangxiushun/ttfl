<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use App\Models\Articles;

class ArticlesController extends Controller
{
    /**
     * 加载主页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Articles::all();
        return view('/Admin/articles/index',['data'=>$data]);
    }

    /**
     * 加载添加页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Admin/articles/create');
    }

    /**
     * 执行添加.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $articles = new Articles;
        $title = $request -> input('title','重大新闻overlord第三季七月份在哔哩哔哩上映');
        $author = $request->input('author','张三');
        $content = $request-> input('editorValue','吾乃侍奉无上至尊之人');
        $articles -> title = $title;
        $articles -> author = $author;
        $articles -> content = $content;
        $res = $articles -> save();
        if($res){
            return redirect('/admin/articles')->with('success','添加成功');
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
        $data = Articles::find($id);
        return view('/Admin/articles/show',['data'=>$data]);
    }

    /**
     * 加载修改页面.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Articles::find($id);
        return view('/Admin/articles/edit',['data'=>$data]);
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
        // 接受提交过来的数据
        $title = $request -> input('title','没有标题');
        $author = $request -> input('author','超级大坏哥');
        $content = $request -> input('editorValue','空内容');
        $article = Articles::find($id);
        $article -> title = $title;
        $article -> author = $author;
        $article -> content = $content;
        $res = $article -> save();
        if($res){
            return redirect('/admin/articles')->with('success','修改成功');
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
        $res = Articles::destroy($id);
        if($res){
            return redirect('/admin/articles')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
