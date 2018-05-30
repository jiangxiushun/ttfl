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
        <span>修改用户</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/users/{{$data->id}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="username" value="{{ $data -> username}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">头像</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <img src="{{ $data -> profile}}" style="width:100px;">
                            <input type="file" class="small"  name="profile">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phone" value="{{ $data -> phone}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="email" value="{{ $data -> email}}">
                        </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="修改" class="btn btn-warning">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection