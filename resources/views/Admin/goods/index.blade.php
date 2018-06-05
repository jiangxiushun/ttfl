@extends('Admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 用户列表</span>
    </div>
        <div class="mws-panel-body no-padding">
            <form action="/admin/good" method="get">
                <div class="dataTables_length">
                    <label>显示:
                        <select name="count">
                            <option value="5" @if( $count == 5 ) selected @endif >5</option>
                            <option value="10" @if( $count == 10 ) selected @endif >10</option>
                            <option value="15" @if( $count == 15 ) selected @endif >15</option>
                        </select> 页
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    关键字: <input type="text" name="gname"><input type="submit" value="搜索" class="btn btn-success">
                </div>
            </form>
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>单价</th>
                        <th>图片1</th>
                        <th>图片2</th>
                        <th>类别</th>
                        <th>描述</th>
                        <th>库存</th>
                        <th>销量</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
            <tbody> 
            @foreach( $data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->gname}}</td>
                    <td>{{$v->price}}</td>
                    <td><img src="{{$v->profile1}}" class="img-circle" style="width:50px"></td>
                    <td><img src="{{$v->profile2}}" class="img-circle" style="width:50px"></td>
                    <td>{{$v->goodcates->cname}}</td>
                    <td style="width:200px">{!!$v->content!!}</td>
                    <td>{{$v->stock}}</td>
                    <td>{{$v->salecnt}}</td>
                    @if($v->status == 1)
                    <td>普通商品</td>
                    @elseif($v->status == 2)
                    <td>热销商品</td>
                    @elseif($v->status == 3)
                    <td>厂家推销</td>
                    @endif
                    <td>
                        <form action="/admin/good/{{$v->id}}" method="post" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        <a href="/admin/good/{{$v -> id}}/edit" class=" btn btn-warning">修改</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
        {!! $data->appends(['gname'=>$gname,'count'=>$count])->render() !!}
        </div>
    </div>
</div>
@endsection