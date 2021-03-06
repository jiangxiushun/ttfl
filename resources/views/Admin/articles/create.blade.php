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
        <span>添加文章</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/articles" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">文章标题</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="title" value="{{old('title')}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章作者</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="author" value="{{old('author')}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章内容</label>
                    <div class="mws-form-item" style="width: 500px; padding-right: 84px;">
                        <script id="gdesc" type="text/plain">
                        {{old('content')}}
                        </script>
                    </div>
                </div>
                <!-- 配置文件 -->
                <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
                <!-- 编辑器源码文件 -->
                <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('gdesc',{
                        toolbars: [
                                    ['fullscreen', 'source', 'undo', 'redo'],
                                    ['bold', 'italic', 'underline', 'fontborder', 'strikethrough','blockquote', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','simpleupload']
                                ]
                    });
                </script>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection