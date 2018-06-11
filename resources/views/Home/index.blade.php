@extends('Home.common.common')
@section('content')
<div class="banner-box">
    <div class="fullSlide">
        <div class="bd">
            <ul>
                <!-- 轮播图开始 -->
                    @foreach($lunbo as $k=>$v)
                    <li style="background:url('{{$v->profile}}')  center 0 no-repeat;">
                        <div class="siteWidth">
                            <a target="_blank" href="http://{{$v->link}}" title=""></a>
                        </div>
                    </li>
                    @endforeach
                <!-- 轮播图结束 -->
            </ul>
        </div>
        <div class="hd"><ul></ul></div>
    </div>
    <div class="banner-box-product">
        <div class="box-product">
            <ul class="clearfix">
                            </ul>
        </div>
    </div>
</div>
  <div class="cysm-box">
      <div class="cysm main">
          <div class="part-container">
              <div class="part-title clearfix">
                  <div class="indexleft"></div>
                  <div class="indexname">3C数码<span> Creative Digital</span></div>
                  <a class="indexmore" href="category.php?id=305" title="3C数码" target="_blank">更多 ></a>
              </div>
          </div>
          <div class="part-container clearfix">
              <div class="part-left">
                  <div class="part-left-1"  style="width:235px;border:1px dashed #FBB301"> 
                      <div>
                          <center style="font-size:20px;color:#DD5044;">公告</center>
                          <center style="color:#FFA001;">---------------------------------------------</center>
                          <ul>
                            @foreach($articles as $k=>$v)
                            <li style="padding-left:20px;font-size:14px;"><a href="/home/articles/{{$v->id}}">{{$v->title}}</a></li>
                            @endforeach
                          </ul>
                      </div>
                  </div>
                  <a class="part-left-2" href="#" target="_blank" title="">
                  <img src="/Home/picture/2016110801.jpg"></a>
              </div>
              <div class="part-center">
                   <ul class="clearfix">
                        @foreach($goods as $k=>$v)
                        <li class="part-list-item">
                            <a class="part-info" href="goods.php?id=1080" title="{{$v->gname}}" target="_blank">
                                <img class="part-img light" src="{{$v->profile1}}">
                                <h3 class="ell">{{$v->gname}}</h3>
                                <div class="product-info ell"></div>
                                <div class="price">¥{{$v->price}}</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                <style>
                    .pagelist .pageBtnWrap {
                        display: block;
                        width: 100%;
                    }
                    .pagelist {
                        margin-top: 60px;
                        margin-bottom: 60px;
                        text-align: center;
                    }

                </style>
              </div>
              <div class="part-right">
                  <p class="part-suggest-title">热销推荐</p>
                  <div class="part-suggest">
                    @foreach($rexiao as $k=>$v)
                        <a href="goods.php?id=1081" class="" target="_blank" title="goods.php?id=1081">
                            <dl>
                                <dt>
                                 <img class="" src="{{$v->profile1}}"></dt>
                                <dd class="title ell">{{$v->gname}}</dd>
                                <dd class="info ell"></dd>
                                <dd class="price">
                                    ￥{{$v->price}}                               
                                </dd>
                            </dl>
                        </a>
                    @endforeach
                     </div>

              </div>
          </div>
      </div>
  </div>
<div class="pagelist" >
    {!! $goods->render() !!}
</div>
<div style="width:100%;height: 43px;background-color:#f5f5f5"></div>
<style type="text/css">
.pagelist ul{
    margin-left: 500px;
}
.pagelist ul .active span{
    display: block;
    border: 1px solid #ccc;
    width: 33px;
    height: 33px;
    text-align: center;
    line-height: 35px;
    margin-left: 5px;
    background-color: #ccc;
}
.pagelist ul li{
    float:left;
}

.show_ads{position: fixed;width:100%;height:592px;top:18%;left:0;display:block;z-index: 999;cursor: pointer;}
.ads_img{position:relative;width:368px;height:394px;margin:0 auto;border:0px solid red;}
.hb_close{position: absolute; display: block; width: 50px; height: 50px; top: 7px;right: 40px;border: 0px solid red;}
</style>
<!-- <div class="show_ads">
    <p class="ads_img">
      <span class="hb_close"></span>
      <a onclick="gettj()" href="http://www.heiniubao.com/activity/51ful" target="_blank"><img src="/Home/picture/ads_1.png" /> </a>
    </p>
</div> -->
<script type="text/javascript">
$(function(){
    $(".hb_close").click(function(){
        $(".show_ads").css("display","none");
    })
    setTimeout(function(){
      $(".show_ads").css("display","none");
    },3000);
})
function gettj(){
  _czc.push(['_trackEvent', '平安PC', '首页', '','','']);
}
</script>
@endsection