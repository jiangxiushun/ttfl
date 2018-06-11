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
    <div class="mws-panel-header" style="background-color:#ooo">
        <span>修改用户密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:red;font-weight:bolder;background-color:#ooo">修改用户密码一定要是用户允许的！！！请谨慎修改</font> </span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/home/users/{{$data->id}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">新密码:</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="password">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">新确认密码:</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="repassword">
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