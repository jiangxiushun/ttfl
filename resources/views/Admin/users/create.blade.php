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
        <span>添加用户</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <select class="small" name="status">
                                <option value="1">超级管理员</option>
                                <option value="2">普通用户</option>
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="username" value="{{old('username')}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="password" >
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="repassword">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">头像</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="file" class="small"  name="profile">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phone" value="{{old('phone')}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="email" value="{{old('email')}}">
                        </div>
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