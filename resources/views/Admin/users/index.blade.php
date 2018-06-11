@extends('Admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 用户列表</span>
    </div>
        <div class="mws-panel-body no-padding">
            <form action="/admin/users" method="get">
                <div class="dataTables_length">
                    <label>显示:
                        <select name="count">
                            <option value="5" @if( $count == 5 ) selected @endif >5</option>
                            <option value="10" @if( $count == 10 ) selected @endif >10</option>
                            <option value="15" @if( $count == 15 ) selected @endif >15</option>
                        </select> 页
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    关键字: <input type="text" name="username"><input type="submit" value="搜索" class="btn btn-success">
                </div>
            </form>
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>头像</th>
                        <th>手机号</th>
                        <th>邮箱</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
            <tbody> 
            @foreach( $data as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->username}}</td>
                    <td><img src="{{$v->profile}}" class="img-circle" style="width:50px"></td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->email}}</td>
                    @if($v->status == 1)
                    <td>超级管理员</td>
                    @elseif($v->status == 2)
                    <td>普通管理员</td>
                    @endif
                    <td>{{$v->created_at}}</td>
                    <td>
                        <form action="/admin/users/{{$v->id}}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        <a href="/admin/users/{{$v -> id}}/edit" class=" btn btn-warning">修改</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
            
        {!! $data->appends(['username'=>$uname,'count'=>$count])->render() !!}
        </div>
    </div>
</div>
@endsection