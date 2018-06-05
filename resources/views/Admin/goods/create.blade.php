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
        <span>添加商品</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/good" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">属于分类</label>
                        <div class="mws-form-item">
                            <select class="small" name="cid">
                                @foreach( $cates as $k=>$v)
                                <option value="{{$v-> id}}">{{$v->cname}}</option>
                                @endforeach                      
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="gname" value="{{old('gname')}}">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品状态:</label>
                        <div class="mws-form-item">
                            <select class="small" name="status">
                                <option value="1" selected>---普通商品---</option>
                                <option value="2">---热销商品---</option>          
                                <option value="3">---厂家推荐---</option>      
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片1</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="file" class="small"  name="profile1">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片2</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="file" class="small"  name="profile2">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品库存</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="text" class="small"  name="stock">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="text" class="small"  name="price"><img src="/Admin/img/1.jpg" style="width:20px">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品描述</label>
                    <div class="mws-form-item" style="width: 500px; padding-right: 84px;">
                        <script id="gdesc" type="text/plain">

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
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection