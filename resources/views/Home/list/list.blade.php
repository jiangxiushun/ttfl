@extends('Home.common.common')
@section('content')
  <style type="text/css">
    .main{width: 1200px;margin: 0 auto;min-width: 1200px;position: relative;}
  </style>
    <div class="mod-column">
      <div class="main">
        <div class="search-box">
          <div class="search-nav">当前位置:
            <a href=".">首页</a>
            <code>&gt;</code>
            <a href="category.php?id=263"></a></div>
        </div>
        <div class="filter-box">
          <div class="filter clearfix">
            <div class="hint">分类：</div>
            <div class="option-box">
              <a href="category.php?id=264">游戏键鼠</a>
              <a href="category.php?id=265">游戏耳麦/耳机</a>
              <a href="category.php?id=266">音箱/其他</a>
              <a href="category.php?id=315">QQ会员专题</a>
              <div class="find-more">
                <a class="find-txt">查看更多</a>
                <i class="more-down"></i>
              </div>
            </div>
          </div>
          <div class="filter js-sort last">
            <span class="hint">排序：</span>
            <a class="" href="" style="">默认</a>
            <a class="" href="#" style="">最新</a>
            <a class="item-prize" href="#">价格
              <i class="active"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="mod-list">
      <div class="main">
        <div class="list-container" id="j-list">
          <ul class="list">
          @foreach($goods as $k=>$v)
            <li class="list-item">
              <dl class="desc">
                <dt class="pic">
                  <a target="_blank" href="/home/show/{{$v->id}}">
                    <img src="{{$v->profile1}}"></a>
                </dt>
                <dd class="cont">
                  <a target="_blank" href="">
                    <span class="column-title">{{$v->gname}}</span>
                    <span class="column-price">
                      <i>¥</i>{{$v->price}}</span>
                  </a>
                </dd>
                <!-- <dd class="btns">
                <a href="goods.php?id=1430" class="add-cart">
                <i></i>加入购物车
                </a>
                </dd> -->
              </dl>
            </li>
          @endforeach
          </ul>
          <div class="list-item clone-item" id="js-clone-item"></div>
        </div>
        <div class="pagelist">
          <div>
            <span class="pageBtnWrap">
              <div class="pagebar">
                <form name="selectPageForm" action="/category.php" method="get">
                  <div id="pager">总计
                    <b>99</b>个记录
                    <span class="page_now">1</span>
                    <a href="category.php?id=263&amp;price_min=0&amp;price_max=0&amp;page=2&amp;sort=last_update&amp;order=DESC">2</a>
                    <a href="category.php?id=263&amp;price_min=0&amp;price_max=0&amp;page=3&amp;sort=last_update&amp;order=DESC">3</a>
                    <a href="category.php?id=263&amp;price_min=0&amp;price_max=0&amp;page=4&amp;sort=last_update&amp;order=DESC">4</a>
                    <a href="category.php?id=263&amp;price_min=0&amp;price_max=0&amp;page=5&amp;sort=last_update&amp;order=DESC">5</a>
                    <a class="next" href="category.php?id=263&amp;price_min=0&amp;price_max=0&amp;page=2&amp;sort=last_update&amp;order=DESC">下一页</a></div>
                </form>
              </div>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="service-suspend rightx_hover">
      <ul class="clearfix">
        <li>
          <div class="service-content service-phone">
            <div class="service-phone-c">0755-27208365</div></div>
        </li>
        <li>
          <div class="service-content service-qq">
            <a class="" href="javascript:;" title="" target="_self"></a>
          </div>
        </li>
        <li>
          <div class="service-content service-dd">
            <a class="" href="user.php?act=order_list" title="" target="_self"></a>
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
    <script type="text/javascript">
        $('.sn_nav').css('display','none');
        $('.sn_nav').parent().parent().mouseover(function(){
        $('.sn_nav').css('display','list-item');
      }).mouseout(function(){
        $('.sn_nav').css('display','none');
      });
    </script>
    <script>
    /*商品栏目*/
    $("#j-list li").hover(function () {
        $("#js-clone-item").addClass('active').empty().append($(this).html()).stop().show().animate({left: $(this).position().left+3,top: $(this).position().top}, 150);
    }, function () {
        if ($("#js-clone-item").hasClass('active')) {
            $("#js-clone-item").live('mouseleave', function () {
                $(this).removeClass('active').empty().stop().hide();
            })
        }
    });
    $(".filter-box .filter").find("a").on("click",function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    if($(".option-box").height()>48){
        $(".option-box").addClass("unspread");
        $(".find-more").show().toggle(function () {
            $(".option-box").removeClass("unspread");
            $(this).addClass("act").find("i").removeClass().addClass("more-up");
        },function () {
            $(".option-box").addClass("unspread");
            $(this).removeClass("act").find("i").removeClass().addClass("more-down");
        })
    }
    $(".delete-btn").on("click",function () {
        $(".tag-box").hide();
    })
    //图片延时加载
    $("img").lazyload({effect: "fadeIn",threshold: 200});
    jQuery(".fullSlide").slide({titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click"});
</script>
@endsection