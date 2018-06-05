@extends('admin.layout.index')

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
        <span>添加子类</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/cates/insert" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">父级分类</label>
                        <div class="mws-form-item">
                            <select class="small" name="pid">
                                <option value="{{$data->id}}">{{$data->cname}}</option>          
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="cname" value="{{old('cname')}}">
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