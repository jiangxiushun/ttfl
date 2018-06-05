@extends('Admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 轮播列表</span>
    </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>轮播图片</th>
                        <th>链接</th>
                        <th>操作</th>
                    </tr>
                </thead>
                @foreach($data as $k=>$v)
                <tr>
                    <td><center>{{$v->id}}</center></td>
                    <td><center><img src="{{$v->profile}}" style="width:100px"></center></td>
                    <td><center>{{$v->link}}</center></td>
                   <td style="width:200px">
                        <form action="/admin/lunbos/{{$v->id}}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        <a href="/admin/lunbos/{{$v -> id}}/edit" class=" btn btn-warning">修改</a>
                    </td>
                </tr>
                @endforeach
            <tbody> 
           
        </table>
    </div>
</div>
@endsection