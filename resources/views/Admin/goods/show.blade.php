@extends('Admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>商品详情</span>
    </div>
    <div class="mws-panel-body no-padding mws-form">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">属于分类</label>
                        <div class="mws-form-item">
                            <select class="small" name="cid" disabled="disabled">
                            	@foreach( $cates as $k=>$v)
                                <option value="{{$v -> id}}" {{ $v->id==$data->cid ? 'selected' : '' }}>{{$v->cname}}</option>
                                @endforeach 
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="gname" value="{{$data->gname}}" readonly="readonly">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品状态:</label>
                        <div class="mws-form-item">
                            <select class="small" name="status" disabled="disabled">
                                <option value="1" {{ $data->status==1 ? 'selected' : '' }}>--普通商品--</option>
                                <option value="2" {{ $data->status==2 ? 'selected' : '' }}>--热销商品--</option>
                                <option value="3" {{ $data->status==3 ? 'selected' : '' }}>--厂家推荐--</option>    
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片1</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                        	<img src="{{$data->profile1}}" style="width:100px">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片2</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                        	<img src="{{$data->profile2}}" style="width:100px">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品库存</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="text" class="small"  name="stock" value="{{$data->stock}}" readonly="readonly">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item" style="width: 200px; padding-right: 84px;">
                            <input type="text" class="small"  name="price" value="{{$data->price}}" readonly="readonly"><img src="/Admin/img/1.jpg" style="width:20px">
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品描述</label>
                    <div class="mws-form-item" style="width: 500px; padding-right: 84px;">
                        	{!! $data->content !!}
                    </div>
                </div>
    </div>      
</div>
@endsection