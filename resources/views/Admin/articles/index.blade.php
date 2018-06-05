@extends('Admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 友情链接列表</span>
    </div>
        <div class="mws-panel-body no-padding">
            <form action="/admin/link" method="get">
                {{--<div class="dataTables_length">
                    <label>显示:
                        <select name="count">
                            <option value="5" @if( $count == 5 ) selected @endif >5</option>
                            <option value="10" @if( $count == 10 ) selected @endif >10</option>
                            <option value="15" @if( $count == 15 ) selected @endif>15</option>
                        </select> 页
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    关键字: <input type="text" name="title"><input type="submit" value="搜索" class="btn btn-success">
                </div>--}}
            </form>
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>类别</th>
                        <th>文章标题</th>
                        <th>文章作者</th>
                        <th>操作</th>
                    </tr>
                </thead>
            <tbody>
            @foreach( $data as $k=>$v)
                <tr>
                    <td><center>{{$v->id}}</center></td>
                    <td><center>@if($v->category == 1)
							公告
							@elseif($v->category == 2)
							促销
							@endif
                    </center></td>
                    <td><center>{{$v->title}}</center></td>
                    <td><center>{{$v->author}}</center></td>
                    <td><center>
                        <form action="/admin/articles/{{$v->id}}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        <a href="/admin/articles/{{$v -> id}}" class=" btn btn-info">查看详情</a>
                        <a href="/admin/articles/{{$v -> id}}/edit" class=" btn btn-warning">修改</a>
                    </td>
                    </center>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
        {{-- $data->appends(['title'=>$title,'count'=>$count])->render() --}}
        </div>
    </div>
</div>
@endsection