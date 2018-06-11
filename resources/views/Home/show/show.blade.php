@extends('Home.common.common')
@section('content')
<div class="mod-goods">
    <div class="main clearfix">
        <div class="product-intro clearfix">
            <div class="preview-wrap">
                <div id="spec-n">
                    <div class="main-img"> 
                    <a href="javascript:;" style="display: table-cell; max-width: 100%; max-height: 100%;vertical-align: middle">
                        <img src="{{$good->profile1}}" jqimg="{{$good->profile1}}" />
                        </a>
                    </div>
                </div>
                <div class="spec-list" id="spec-list">
                    <ul class="clearfix">
                                                    <li>
                                <a href="javascript:void(0);" data-src="{{$good->profile1}}">
                                    <img src="{{$good->profile1}}" data-src="{{$good->profile1}}" class="checked" />
                                </a>
                            </li>
                                                    <li>
                                <a href="javascript:void(0);" data-src="{{$good->profile2}}">
                                    <img src="{{$good->profile2}}" data-src="{{$good->profile1}}" class="" />
                                </a>
                            </li>
                                            </ul>
                </div>
            </div>
            
            <form class="goodsform" action="javascript:addToCart(1562)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY"  >
                <div class="itemInfo-wrap">
                    <h3 class="goods-name">{{$good->gname}}</h3>
                    <p class="goods-label">0元购商品限购每单限购一件多拍不发货！</p>
                    <div class="summary" style="position: relative;">
                        <!-- </div> -->
                        <div class="summary-prize clearfix">
                            <div class="prize-box">
                                <span class="prize-item">福利价：</span>
                                    <span class="prize-num">
                                    <i>¥</i>{{$good->price}}</span>
                                <s class="prize-none">¥0.00</s>
                                    <span class="sale-num">累计销量<p style="color:#0AB4FC">{{$good->salecnt}}</p></span>
                            </div>
                                                    </div>
                        
                        <div class="choose-wrap">
                            
                            <div class="choose-box choose-freight clearfix" id="j-province">
                                <div class="dt">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</div>
                                <div class="m-dd clearfix">
                                    <div class="dd province-item">
                                        <span>深圳至<em>北京</em><i></i></span>
                                    </div>
                                    <div class="dd postage">
                                        快递：<span>0</span>
                                        <span class="tip-txt">拍下后，48小时内发货，请放心购买<i></i></span>
                                    </div>
                                    <div id="more-item" class="ks-overlay mui_addr_sup">
                                        <div class="ks-overlay-content">
                                            <div class="clearfix ">
                                                <a class="mui_addr_Close" href="javascript:;" id="j-province-close">关闭</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                     
                                <div class="choose-box choose-size clearfix">
                                    <div class="dt">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</div>
                                    <div class="m-dd">
                                        <div class="dd">
                                            <ul class="clearfix">
                                                <li class="act">
                                                    <input style="display:none" id="spec_value_6014" type="radio" name="spec_421" value="6014" checked />
                                                    <a href="javascript:void(0);" onclick ="changePrice(this)" dataAttr='6014' class='pic_img' style="background: url({{$good->profile1}}) center no-repeat;background-size: 100%" datagoodid='1562' attrName ='{{$good->gname}}' title="{{$good->gname}}" href_url="">                                 </a>
                                                </li>
                                                <li>
                                                    <input style="display:none" id="spec_value_6015" type="radio" name="spec_421" value="6015"  />
                                                    <a href="javascript:void(0);" onclick ="changePrice(this)" dataAttr='6015' class='pic_img' style="background: url({{$good->profile2}}) center no-repeat;background-size: 100%" datagoodid='1562' attrName ='{{$good->gname}}' title="{{$good->gname}}" href_url="">
                                                    </a>
                                                </li>
                                                                                                                                                                                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <div class="choose-box choose-pay clearfix" id="j-choose-pay">
                            <div class="dt">支&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;付：</div>
                                <div class="m-dd">
                                    <div class="dd pay-method">
                                        <span class="pay-zfb"><i></i>支付宝支付</span>
                                        <span class="pay-weixin"><i></i>微信支付</span>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-box choose-amount clearfix" id="j-choose-amount">
                                    <div class="dt">数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量：</div>
                                    <div class="m-dd">
                                        <div class="wrap-input dd">
                                            <a class="btn-reduce unclick" href="javascript:void(0);">-</a>
                                            <a class="btn-add" href="javascript:void(0);">+</a>
                                            <input name="number" class="text buy-num" type="text" value="1" id="buy-num">
                                        </div>
                                        <div class="dd stock">
                                            库存量{{$good->stock}}件
                                        </div>
                                    </div>
                                </div>
                             <div class="choose-box promise-box clearfix" style="width:380px;">
                            <div class="dt">服务承诺：</div>
                            <div class="m-dd">
                                <div class="dd">
                                    <span>正品保证</span>
                                    <span>极速退款</span>
                                    <span class="strong">48小时发货</span>
                                </div>
                            </div>
                        </div>
                            <div class="choose-btn clearfix" id="j-choose-btn">
                                <a class="ljgm-btn" href="javascript:;">立即购买</a>
                                <a class="jrgwc-btn" href="javascript:;">加入购物车</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('.jrgwc-btn').click(function(){
                        var num = $('#buy-num').val();
                        var uid = {{session('home_user')->id}};
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        $.get('/home/jrgwc/jrgwc/{{$good->id}}',{'num':num,'uid':uid},function(msg){
                            if(msg == 1){
                                layer.msg('已加入购物车');
                            }else{
                                layer.msg('加入购物车失败');
                            }
                        });
                    });
                </script>
            <div class="mod-aside mod-aside-1" style="max-height: 600px;">
                <h4><i class="ico"></i>热销排行</h4>
                <ul>
                     </ul>
                <ul>
                    @foreach($rexiao as $k=>$v)
                        <li>
                                 <a title="{{$v->gname}}" href="/home/show/{{$v->id}}" target="_blank" class="product_img"> 
                                    <img data-original="{{$v->profile1}}" alt="{{$v->gname}}">
                                    <span class="goods-item">{{$v->gname}}</span>
                                    <span class="goods-prize"><i>¥</i>{{$v->price}}</span>
                                </a> 
                        </li>
                    @endforeach                                           
                </ul> 
                
            </div>
        </div>
        <div class="mod-aside">
            <h4>热销排行</h4>
            <ul>
                @foreach($rexiao as $k=>$v)
                    <li>
                         <a title="{{$v->gname}}" href="/home/show/{{$v->id}}" target="_blank" class="product_img"> 
                            <img data-original="{{$v->profile1}}" alt="{{$v->gname}}">
                            <span class="goods-item">{{$v->gname}}</span>
                            <span class="goods-prize"><i>¥</i>{{$v->price}}</span>
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mod-detail" id="j-detail">
            <div class="tab-nav">
                <ul class="clearfix">
                    <li class="cur"><a href="javascript:void(0);">商品详情</a></li>
                    <li><a href="javascript:gotoPage(1,1562,0);">用户评论（0）</a></li>
                    <li><a href="javascript:void(0);">售后服务</a></li>
                </ul>
                <span class="i-line"></span>
            </div>
            <div class="tab-container" >
                <div class="tab-content act">
                    {!!$good->content!!}
                </div>
                <div class="tab-content"  id="j-comment">
                    
                </div>
                <div class="tab-content">
                    <div class="question-bd">
                        <ul class="content">
                            <li>
                                <h3>如何挑选商品？</h3>
                                <p>点击页面上方“加入购物车”按钮或页面下拉时顶部导航上的“加入购物车”按钮将商品加入购物车，再点击页面右上角的“购物车”前往购物车页面进行结算。</p>
                            </li>
                            <li>
                                <h3>收藏商品功能</h3>
                                <p>点击“收藏按钮”后，按钮中的白心亮起,背景由黑色变为黄色代表收藏成功，再次点击取消收藏。您可在“个人中心”中的我的收藏查看所有收藏商品。</p>
                            </li>
                            <li>
                                <h3>退换货办理流程</h3>
                                <p>您可客服人员沟通，作人员与您进行退换货质量确认并办理相关事宜。无理由退换货需买家承担运费，请谨慎购买！</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mod-fixed">
        <div class="main">
            <div class="tab-nav">
                <ul class="clearfix">
                    <li class="cur"><a href="javascript:void(0);">商品详情</a></li>
                    <li><a href="javascript:gotoPage(1,1562,0);">用户评论（0）</a></li>
                    <li><a href="javascript:void(0);">售后服务</a></li>
                </ul>
            </div>
            <a class="fixed-btn" href="javascript:addToCart(1562,1,264)" id="j-fixed-btn">立即购买</a>
        </div>
    </div>
</div>
<style type="text/css">
.mod-aside ul a img{height:auto;}
</style>
<link rel="stylesheet" href="/Home/css/qd_style.css">
</body>
<div style="display:none;">
</div>
<script src="/Home/js/layer.js"></script>
<script src="/Home/js/jquery.lazyload.js"></script>
<script src="/Home/js/jquery.jqzoom.js"></script>
<script src="/Home/js/clipboard.min.js"></script>
<script>
    var goodsId = '1562';
    var paramStr= '';
    $("img").lazyload({effect: "fadeIn",threshold: 200,placeholder : "/Home/images/goods_error_big.png"});
</script>
</script>
<script src="/Home/js/goods.js"></script>
</html>
<script type="text/javascript">
        $('.sn_nav').css('display','none');
        $('.sn_nav').parent().parent().mouseover(function(){
        $('.sn_nav').css('display','list-item');
      }).mouseout(function(){
        $('.sn_nav').css('display','none');
      });
</script>
@endsection