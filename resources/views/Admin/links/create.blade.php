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
        <span>添加链接</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/link" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="mws-form-inline">
            	<div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                        <div class="mws-form-item" style="width: 600px; padding-right: 84px;">
                            <input type="text" class="small"  name="title">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">链接图片</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="file" class="small"  name="profile">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">链接地址</label>
                        <div class="mws-form-item" style="width: 600px; padding-right: 84px;">
                            <input type="text" class="small"  name="link">
                        </div>
                </div>
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection