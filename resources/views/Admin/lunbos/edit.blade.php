@extends('Admin.layout.index')
@section('content')
<!-- 显示错误信息 -->
@if ( count($errors) > 0 )
<div class="mws-form-message error">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改轮播图</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/lunbos/{{$data->id}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <img src="{{$data->profile}}" alt="">
                            <input type="file" class="small"  name="profile">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">链接</label>
                        <div class="mws-form-item" style="width: 600px; padding-right: 84px;">
                            <input type="text" class="small"  name="link" value="{{$data->link}}">
                        </div>
                </div>
            <div class="mws-button-row">
                <input type="submit" value="修改" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection