@extends('Home.common.common')
@section('content')
<div class="main">
    <div class="cons_tainer con_hei_min" id="shopping-trolley">
        <h2 class="aor_top_tit header_cart"><i></i>购物车商品(<font class="nums" style="display: inline;">2</font>)</h2>
                    <div class="aorder_cons" style="border-bottom: none;">
                <div class="aor_pros_tab">
                    <div class="aor_pros_cell aor_pros_cell_th">
                        <div class="cell wt1">
                            <input type="checkbox" name="allprocheck" value="" class="quanxuan" style="display:inline;">
                            <label class="all-check" id="j-check-all">
                                全选
                            </label>
                        </div>
                        <div class="cell wt2">商品信息</div>
                        <div class="cell wt3">单价(元)</div>
                        <div class="cell wt4">数量</div>
                        <div class="cell wt5">金额</div>
                        <div class="cell wt6">操作</div>
                    </div>
                    @foreach($good_crte as $k=>$v)
                      <div class="aor_pros_cell aor_pros_cell_td clearfix">
                            <div class="cell wt1">
                                <input type="checkbox" name="id" style="display:inline;" class="danxuan">
                            </div>
                            <div class="cell wt2">
                                <input type="hidden" name="id" value="4755505">
                                <a href="/home/show/{{$v->goodCart->id}}" title="{{$v->goodCart->gname}}">
                                    <img src="{{$v->goodCart->profile1}}" alt="{{$v->goodCart->gname}}">
                                </a>
                            </div>
                            <div class="cell wt3">
                                <a class="tit" href="/home/show/{{$v->goodCart->id}}">{{$v->goodCart->gname}}</a>
                                <span class="inf"></span>
                            </div>
                            <div class="cell wt4 font_fim">￥{{$v->goodCart->price}}</div>
                             <div class="cell wt5">
                                <div class="inp_pf clearfix">
                                    <a class="decrease act" href="javascript:;" id="jian">-</a>
                                    <input type="text" name="quantity" class="quantity" value="{{$v->num}}" maxlength="4">
                                    <a class="increase act" href="javascript:;" id="jia">+</a>
                                </div>
                                
                            </div>
                            <div class="cell wt6 font_fim">￥{{$v->num*$v->goodCart->price}}</div>
                            <div class="cell wt7">
                                <a href="javascript:collect(1377)" class="add-favor">加入收藏夹</a><br>
                                <a href="javascript:void(0)" class="delete">删除</a>
                            </div>
                        </div>
                        <script type="text/javascript">
                        $('#jian').click(function(){
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                            $.post('/home/jrgwc/jian/{{$v->id}}',function(msg){});
                        });
                    </script>
                    @endforeach
                </div>
            </div>
            <div class="aorder_sum">
                
                <label class="all-check">
                    <input type="checkbox" value="" class="quanxuan" style="display:inline;height:17px;width:20px;margin-top:20px;margin-left:5px;">
                    <font>全选</font>
                </label>
                <a href="javascript:void(0)" onclick="all_delete()">删除</a>
                <a href="javascript:void(0)" onclick="all_collect()" class="add-favor">加入收藏夹</a>
                <!--<a href="javascript:;" class="share">分享</a>-->
                <span class="choosen">已选商品<em>2</em>件</span>
                <span class="tot_pri">合计（不含运费）:<em>￥108.00</em></span>
                <a href="http://www.51ttfl.com/flow.php?step=checkout" id="submit" class="sumits">去结算</a>
            </div>
            </div>
</div>
<script type="text/javascript">
        $('.sn_nav').css('display','none');
        $('.sn_nav').parent().parent().mouseover(function(){
        $('.sn_nav').css('display','list-item');
      }).mouseout(function(){
        $('.sn_nav').css('display','none');
      });
</script>
<script type="text/javascript">
    $('.quanxuan').click(function(){
        if($(this).attr('checked')){
            $('.danxuan').attr('checked',true);
        }else{
            $('.danxuan').attr('checked',false);
        }
    });
</script>

@endsection