<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateInsertRequest;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
    public static function getCates()
    {
        $sql = "select *,concat(path,',',id) as paths from cates order by paths";
        $data = DB::select($sql);
        foreach($data as $k=>$v){
            //统计字符串出现的次数
            $n = substr_count($v->paths,',');
            $newcname = str_repeat('|----',$n).$v->cname;
            $data[$k]->cname = $newcname;
        }
        return $data;
    }
    /**
     * 加载分类列表.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->getCates();
        return view('/Admin/cates/index',['data'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Cates::all();
        return view('/Admin/cates/create',['data'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateInsertRequest $request)
    {
        //接受post传过来的值
        $data = $request -> except('_token');
        //把值分配给变量
        $cname = $data['cname']; //分类名称
        $pid = $data['pid'];  // 父级ID
        if($pid == 0){
            //顶级分类
            $path = 0;
        }else{
            //子级分类
            $path_data = Cates::where('id',$pid)->first();
            $path = $path_data['path'].','.$path_data['id'];
        }
        $cates = new Cates;//实例化类别类
        //插入数据
        $cates -> cname = $cname;
        $cates -> pid = $pid;
        $cates -> path = $path;
        if($cates -> save()){
            return redirect('/admin/cates')->with('success','添加成功');
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
     * 加载修改模板.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cates::find($id);
        return view('/admin/cates/edit',['data'=>$data]);
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
        $cname = $request->input('cname');
        $cates = Cates::find($id);
        $cates->cname = $cname;
        $res = $cates -> save();
        if($res){
            return redirect('/admin/cates')->with('success','修改成功');
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
        //检查此分类下是否有子类
        $cates = Cates::where('pid',$id)->first();
        if($cates){
            return back()->with('error','该分类有子类不能删除');
            exit;
        }
        //执行删除
        $res = Cates::destroy($id);
        if($res){
            return redirect('/admin/cates')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
    /**
    * 加载添加子类模板
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function sub($id)
    {
        $data = Cates::find($id);
        // dump($data);
        return view('/admin/cates/sub',['data'=>$data]);
    }
    /**
    * 执行添加
    * @return \Illuminate\Http\Response
    */
    public function insert(Request $request)
    {
        //接受post传过来的值
        $data = $request -> except('_token');
        //把值分配给变量
        $cname = $data['cname']; //分类名称
        $pid = $data['pid'];  // 父级ID
        if($pid == 0){
            //顶级分类
            $path = 0;
        }else{
            //子级分类
            $path_data = Cates::where('id',$pid)->first();
            $path = $path_data['path'].','.$path_data['id'];
        }
        $cates = new Cates;//实例化类别类
        //插入数据
        $cates -> cname = $cname;
        $cates -> pid = $pid;
        $cates -> path = $path;
        if($cates -> save()){
            return redirect('/admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
}
