@extends('Admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 前台用户列表</span>
    </div>
        <div class="mws-panel-body no-padding">
            <form action="/home/users" method="get">
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
                    @if($v->phone == [])
                    <td>手机号未填写</td>
                    @elseif($v->phone)
                    <td>{{$v->phone}}</td>
                    @endif
                    <td>{{$v->email}}</td>
                    @if($v->status == 0)
                    <td>普通用户</td>
                    @elseif($v->status == 1)
                    <td>已加入黑名单</td>
                    @endif
                    <td>{{$v->created_at}}</td>
                    <td>
                        <a href="/home/users/{{$v -> id}}/edit" class=" btn btn-danger">修改用户密码</a>
                        @if($v->status == 0)
                        <a href="/home/users/{{$v -> id}}" class="btn btn-danger">加入黑名单</a>
                        @elseif($v->status == 1)
                        <form action="/home/users/{{$v->id}}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="submit" value="解除黑名单" class="btn btn-warning">
                        </form>
                        @endif
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