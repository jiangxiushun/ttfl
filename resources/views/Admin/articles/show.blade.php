@extends('Admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>文章详情</span>
    </div>
    <div class="mws-panel-body no-padding mws-form">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">文章标题</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="title" value="{{$data->title}}" readonly="readonly">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章作者</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="author" value="{{$data->author}}" readonly="readonly">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章内容</label>
                    <div class="mws-form-item" style="width: 500px; padding-right: 84px;">
                        	{!!$data->content!!}
                    </div>
                </div>
            </div>
    </div>      
</div>
@endsection