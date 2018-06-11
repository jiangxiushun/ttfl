@extends('Admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 分类列表</span>
    </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>父级分类</th>
                        <th>PATH</th>
                        <th>操作</th>
                    </tr>
                </thead>
            <tbody> 
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->cname}}</td>
                    <td>{{$v->pid}}</td>
                    <td>{{$v->path}}</td>
                    <td style="width:200px"><center>
                        <form action="/admin/cates/{{$v->id}}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        <a href="/admin/cates/{{$v->id}}/sub" class="btn btn-info">添加子类</a>
                        <a href="/admin/cates/{{$v -> id}}/edit" class=" btn btn-warning">修改</a>
                        </center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection