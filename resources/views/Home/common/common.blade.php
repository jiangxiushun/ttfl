<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="我要天天福利" />
    <meta name="Description" content="我要天天福利" />
    <title>我要天天福利-推荐特价好品的电商</title>
    <link href="/Home/images/small_top.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="/Home/css/reset.css">
    <link rel="stylesheet" href="/Home/css/checkout.css">
    <link rel="stylesheet" href="/Home/css/layer.css">
    <link rel="stylesheet" href="/Home/css/qd_style.css">
    <link rel="stylesheet" href="/Home/css/xxk.css">
    <link rel="stylesheet" href="/Home/css/personal_center_two.css">
    <link rel="stylesheet" href="/Home/css/personal_center.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link href="/Home/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />
    <script src="/Home/js/jquery.js"></script>
    <script src="/layui/layui.js"></script>
    <script type="text/javascript" src="/Home/js/jquery.tabso_yeso.js"></script>
    <script src="/Home/js/jquery.validate.js"></script>
    <script src="/Home/js/public.js" type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div style="width:1200px;margin:0 auto;height:25px; display:none;">
<marquee align="left" behavior="scroll" direction="left" loop="-1" scrollamount="10" scrolldelay="180">
    <p style="width: 100%;height:30px;line-height: 30px;color:red;margin:0 auto;font-size: 16px;">2018年五一小长假将至，根据国务院假期统一安排：4月28日至5月1日休息，5月2日正常上班,期间商城正常下单订货，暂停客服人工服务（QQ客服、电话客服），订单将在节后按下单时间顺序陆续发货！</p>
</marquee>
</div> 
<div class="top-box">
    <div class="top-mian main clearfix">
        <div class="head-left fl">
            <i class="head-left_ico"></i>欢迎来到我要天天福利！
        </div>
        <div class="head-right fr">
            @if(Session::has('home_user'))
                <a href="user.php" class="dl">
                <span class="head">
                    <i></i>
                    <img src="{{session('home_user')->profile}}">
                </span>
                {{session('home_user')->username}}
                <a href="/home/login/logout" class="exit">退出</a>
                <a href="/home/order" class="my-dd">我的订单</a>
                <a>|</a>
                <a href="/home/shoucang" class="scj"><i class="ico"></i>收藏夹</a>
                @elseif(!Session::has('home_user'))</a>
            <div class="head-right fr">
                <a href="/home/login" class="dl" id="dl">登录</a>
                <a href="/home/reg" class="regi" id="regi">免费注册</a>
            </div>
            @endif
        </div>
</div>
   </div>
</div><link rel="stylesheet" href="/Home/css/style.css">
<style type="text/css">
.advert_1{position: absolute;top:0px;width: 348px;height: 227px;background: url("/Home/images/1232133423.png");left: -360px;z-index: 999;display: none;}
.advert_2{position: absolute;top:10px;width: 230px;height: 97px;background: url("/Home/images/3254235435.png");left: 225px;z-index: 999;display: none;}
.advert_3{position: absolute;top:0px;width: 364px;height: 227px;background: url("/Home/images/34654654766576.png");right: -360px;z-index: 999;display: none;}
</style>
<div class="header main">
    <div class="logo"><a href="/" title="" target="_self"><img src="/Home/picture/logo.png"></a></div>
    <div class="search-box">
        <form method="get" action="/home/list">
            <input type="text" value="" name="gname"  class="search_input fl">
            <button class="search-btn fl" ><i class="ico"></i>搜索</button>
        </form>
        <div class="hot-link-box">
            <ul class="clearfix">
                <li><a href="#">创意</a></li>
                <li><a href="#">礼物</a></li>
                <li><a href="#">个性</a></li>
                <li><a href="#">动漫</a></li>
            </ul>
        </div>
    </div>
    <div class="my-cart">
        <a href="/home/wdgwc" class="header-cart">
            <i class="ico"></i>
            我的购物车
            
            <span class="cart-size">(0)</span>
            
            <!--<span class="cart-size cart-size-on">(0)</span>-->
        </a>
    </div>
    <div class="advert_1"></div>
    <div class="advert_2"></div>
    <div class="advert_3"></div>
</div><div class="nav">
    <div class="nav_box main clearfix">
        <div class="all_pro fl">
            <h2><i class="ico"></i>全部商品</h2>
            <ul class="sn_nav clearfix">
                    <!-- 分类开始 -->
                    @foreach($cates_sub as $k=>$v)
                    <li class="nav_li">
                        <a class="nav_a" href="/home/list/{{$v->id}}" target="" title=""><i style="width:65px"></i>{{$v->cname}}</a>
                        <div class="nav_content">
                            <ul class="clearfix">
                                @foreach($v['sub'] as $kk=>$vv)
                                <li class="">
                                    <span><a href="/home/list/{{$vv->id}}" title="" target="_blank">{{$vv->cname}}</a></span>
                                </li>
                                @endforeach                              
                            </ul>
                        </div>
                    </li>
                    @endforeach
                    <!-- 分类结束 -->
            </ul>
        </div>
        <script type="text/javascript">
            $(function(){
                /*var str = $("#ttl").text();
                var strobj = str.split('');
                setInterval(function(){
                    p1 = RandomNumBoth(10,300);
                    p2 = RandomNumBoth(10,300);
                    p3 = RandomNumBoth(10,300);
                    console.log($(".wztx"))
                    $(".wztx").css({"color":"rgb("+p1+","+p2+","+p3+")"});
                },300)*/
                var week = new Date().getDay();
                var h =new Date().getHours();  
                if(week == 0){week = 7;} 
                //5 6  1  10
                console.log(week)
                if(week>=6 ){
                    $("#zm").css("display",'block');
                }else{
                    $("#zn").css("display",'block');
                }
            })
            function RandomNumBoth(Min,Max){
                      var Range = Max - Min;
                      var Rand = Math.random();
                      var num = Min + Math.round(Rand * Range); //四舍五入
                      return num;
                }
        </script>
        <div class="nav_list fl">
            <ul class="clearfix">
                    <li class="">
                        <a href="/"  >首页<span></span></a>
                    </li>
                                    <li class="">
                        <a href="/home/list/{{$cates[0]->id}}"  >游戏外设<span></span></a>
                    </li>
                    <li class="">
                        <a href="/home/list/{{$cates[1]->id}}"  >创意数码<span></span></a>
                    </li>
                                    <li class="">
                        <a href="/home/list/{{$cates[2]->id}}"  >VR-虚拟现实<span></span></a>
                    </li>
                                <li class="" id="zn" style="display: none;">
                   <a style="color:red;" id="ttl_9" href="http://yhs999.cn/index.php?r=nine&u=361075" target="_blank">
                   <font style="font-size: 23px">9块9</font>
                   包邮专区
                   </a>
                </li>
                <li class="" id="zm" style="display: none;">
                   <a style="color:rgb(255, 103, 0);font-size: 18px;font-weight: 600;width: 157px;" id="ttl_yz" class="wztx" href="http://yhs999.cn/index.php?r=nine&u=361075" target="_blank">周末<font style="font-size: 25px">1折</font>秒杀</a>
                </li> 
                
             
                
            </ul>
        </div>
        <div class="photo">
            <div class="c-1">0755-27208365</div>
            <div class="c-2">周一至周六09:30-19:00</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $("#ttl_9").click(function(){
             _czc.push(['_trackEvent', '桃太郎9.9专区', '', '','','']);
             console.log(1);
             return true;
        })
        $("#ttl_yz").click(function(){
             _czc.push(['_trackEvent', '桃太郎1折秒杀', '', '','','']);
             return true;
        })
    })
</script>
<!-- 加载内容 -->
@section('content')

@show
<!-- 内容结束 -->
<div class="footer">
    <div class="footer-content main">
        <div class="c-1 clearfix">
            <div class="item-1"><img src="/Home/picture/footer.png"></div>
            <div class="item-2">
                <div class="ewm-box"><img src="/Home/picture/gzh.jpg"></div>
                <div class="ewm-light"></div>
            </div>
        </div>
        <div class="foot_info_list">
                友情链接 ||
                @foreach($links as $k=>$v)
                    <a href="http://{{$v->link}}"><img src="{{$v->profile}}" style="width:60px"></a><a href="http://{{$v->link}}">{{$v->title}}</a>
                @endforeach
                <br><br> 
                <a href="#"  title="公司简介" >公司简介</a>
             
                <a href="#"  title="免责条款" >免责条款</a>
             
                <a href="#"  title="隐私保护" >隐私保护</a>
             
                <a href="#"  title="常见问题" >常见问题</a>
             
                <a href="#"  title="联系我们" >联系我们</a>
                <p class="mgt">Copyright ©2016 深圳市智盈优创网络科技有限公司ttfl.com All Rights Reseryved&nbsp粤ICP备16046348号-1&nbsp;</p>
        </div>
    </div>
</div>
<div class="service-suspend rightx_hover">
    <ul class="clearfix">
        <li>
            <div class="service-content service-phone">
               <div class="service-phone-c">0755-27208365</div>
            </div>
        </li>
        <li>
            <div class="service-content service-qq">
                <a class="" href="javascript:;" title="" target="_self"></a>
            </div>
        </li>
        <li>
            <div class="service-content service-dd">
                <a class="" href="/Home/login" title="" target="_self"></a>
            </div>
        </li>
        <li>
            <div class="service-content service-cart">
                <a class="" href="flow.php" title="" target="_self"></a>
            </div>
        </li>
        <li>
            <div class="service-content service-ewm">
                <a class="" href="" title="" target="_self"></a>
            </div>
            <div class="service-ewm-c"></div>
        </li>
        <li>
            <div class="service-content service-top">
                <a class="" href="javascript:pageScroll()" title="" target="_self"></a>
            </div>
        </li>
    </ul>
</div>
<div class="modal"></div>

<style type="text/css">
.tc{position:fixed;right:20px;bottom:-250px;width:400px;height:215px;border:1px solid #e4e4e4;border-radius: 5px;background: white;z-index: 9999;
     }
.tt{width:80%;height:35px;line-height: 35px;margin:0 auto;text-align: center;margin-top:20px;}
.tt a{color:#ff6700;font-size: 16px;}
.cont a{font-size: 15px;}
.cont{width:80%;height:25px;line-height: 25px;margin:0 auto;font-size: 15px;}
.close_tc{position:absolute;right:5px;top:5px;background:url("/Home/images/close_tc.png") no-repeat;
background-size:100% 100%;display:block;width:15px;height:15px;cursor:pointer;}
</style>

<!-- <link rel="stylesheet" type="text/css" href="/Home/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/Home/css/htmleaf-demo.css"> -->
<link rel="stylesheet" href="/Home/css/qd_style.css">
<style type="text/css">
.zzp{width:100%;height:100%;position: fixed;top:0;left:0;background: gray;opacity: 0.8;z-index: 9999;display: none;}
    #qiandao-rule-list {color: #8d8ebb;font-size: 1pc;line-height: 26px}
}
</style>
<div class="zzp"></div>
<div class="htmleaf-container" style="z-index: 999999;position:fixed;top:100px;left:20%;display: none;">
    <div class="qiandao-warp">
        <div class="qiandap-box">
            <div class="qiandao-con clear">
                <div class="qiandao-left">
                    <div class="qiandao-left-top clear" style="height:36px;">
                        <div class="current-date" style="padding-top:20px;"></div>
                        <!-- <div class="qiandao-history qiandao-tran qiandao-radius" id="js-qiandao-history">我的签到</div> -->
                    </div>
                    <div class="qiandao-main" id="js-qiandao-main">
                        <ul class="qiandao-list" id="js-qiandao-list">
                                                    </ul>
                    </div>
                </div>
                <div class="qiandao-right">
                    <div class="qiandao-top">
                        <div class="just-qiandao qiandao-sprits " id="js-just-qiandao">
                        </div>
                        <p class="qiandao-notic">
                            已经签到<span style="color:#b25d06 !important;text-align:center;font-size:18px !important;">0</span>天
                        </p>
                        
                    </div>
                    <div class="qiandao-bottom">
                        <div class="qiandao-rule-list" id="qiandao-rule-list" style="color: #8d8ebb;font-size: 1pc;line-height: 26px">
                            <h4>签到规则</h4>
                            <p>1.用户每日签到可获得2福币；</p>
                            <p>2.累计签到满3天、7天、14天、21天、28天可额外获得金币礼包；</p>
                            <p>3.福币可直接用于支付商城中的订单，在消费时100个福币可抵1元现金使用；</p>
                            <p>4.活动最终解释权归51天天福利商城所有。</p>
                        </div>
                        <!-- <div class="qiandao-rule-list">
                            <h4>其他说明</h4>
                            <p>如果中间有一天间断未签到的，重先开始计算连续签到时间。</p>
                            <p>连续签到获得奖励后分享到QQ空间、微信朋友圈后再获得一次奖励，每天只限分享一次。</p>
                            <p>签到所获福币购买抵现哦。</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="qiandao-layer qiandao-history-layer">
        <div class="qiandao-layer-con qiandao-radius">
            <a href="javascript:;" class="close-qiandao-layer qiandao-sprits"></a>
            <ul class="qiandao-history-inf clear">
                <li>
                    <p>连续签到</p>
                    <h4>5</h4>
                </li>
                <li>
                    <p>本月签到</p>
                    <h4>17</h4>
                </li>
                <li>
                    <p>总共签到数</p>
                    <h4>28</h4>
                </li>
                <li>
                    <p>签到累计奖励</p>
                    <h4>30</h4>
                </li>
            </ul>
            <div class="qiandao-history-table">
                <table>
                    <thead>
                        <tr>
                            <th>签到日期</th>
                            <th>奖励</th>
                            <th>说明</th>
                        </tr>
                    </thead>
                    <table>
                        <tr>
                            <td>2016-1-6 14:23:45</td>
                            <td>0.20</td>
                            <td>连续签到19天奖励</td>
                        </tr>
                    </table>
                </table>
            </div>
        </div>
        <div class="qiandao-layer-bg"></div>
    </div>
    
    
    <style type="text/css">
    
    </style>
    <div class="qiandao-layer qiandao-active">
        <div class="qiandao-layer-con qiandao-radius" style="width:365px;height:365px;">
            <a href="javascript:;" class="close-qiandao-layer qiandao-sprits"></a>
            <div class="yiqiandao clear" style="margin-top:131px;margin-left:64px;height:200px">
                <div class="yiqiandao-icon qiandao-sprits"></div><!-- 您已连续签到<span>2</span>天 -->
            </div>
            <!-- <div class="qiandao-jiangli qiandao-sprits">
                <span class="qiandao-jiangli-num">0.55<em>元</em></span>
            </div>
            <a href="#" class="qiandao-share qiandao-tran">分享获取双倍收益</a> -->
        </div>
        <div class="qiandao-layer-bg"></div>
    </div>
    
</div>
<script src="/Home/js/main.js"></script>
</body>
<div style="display:none;">
</div>
<div style="display:none;">
</div>
<div style="display:none;">
</div><script src="/Home/js/layer.js"></script>
<script src="/Home/js/jquery.lazyload.js"></script>
<script src="/Home/js/placeholder.js" type="text/javascript"></script>
<script src="/Home/js/jquery.superslide.2.1.1.js" type="text/javascript"></script>
<script type="text/javascript">
    //图片延时加载
    $("img").lazyload({effect: "fadeIn",threshold: 200});
    jQuery(".fullSlide").slide({titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click"});
</script>