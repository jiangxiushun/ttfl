var $already = $("#j-choose-already");
$(document).ready(function(){
    /*商品放大*/
    $(".main-img").jqueryzoom({
        xzoom: 400,
        yzoom: 400,
        offset: 15,
        position: "right",
        preload: 1,
        lens: 1
    });
    changePrice_onload();
    changeShipping(2);
})
/*商品详情*/
$(function () {
    $("#spec-list a").bind("mouseover", function () {
        var src = $(this).attr("data-src");
        $("#spec-n img").eq(0).attr({
            src: src.replace("\/n5\/", "\/n1\/"),
            jqimg: src.replace("\/n5\/", "\/n0\/")
        });
    });
    $("#j-province").find(".province-item").on("click",function () {
        $(".mui_addr_Sup2box").hide();
        $("#more-item").slideDown(200).find("#j-mui-province li").removeClass("mui_addr_selected").on("click", function () {

            var $province = $(this).attr('value');
            getarea($province,2);

            if(!$(this).hasClass("mui_addr_Sup2box")){
                var _index=parseInt($(this).index()/7);
                $(this).addClass("mui_addr_selected").siblings().removeClass("mui_addr_selected");

                $(".mui_addr_Sup2box").hide().eq(_index).slideDown(200);
            }
        });
    });
    $(".mui_addr_Sup2box a").live("click",function () {
        var $txt        = $(this).text();
        var region_id   = $(this).attr('region_id');
        $("#more-item").hide();
        changeShipping(region_id);
        $("#j-province").find(".province-item em").text($txt);

    });
   $("#j-zxCity").find("a").on("click",function () {
        var $txt = $(this).text();
        $("#more-item").hide();
        $("#j-province").find(".province-item em").text($txt);
   });
    $("#j-province-close").on("click",function () {
        $("#more-item").hide();
        return false;
    });
    $("#j-province").find('.tip-txt i').on("click", function () {
        $(".tip-txt").hide();
    });
    /*数量*/
    var $buy_num = $("#buy-num");
    var _num = $buy_num.val();

    $("#j-choose-amount").find(".btn-add").on("click", function () {
        if(_num > 200 ){
            $buy_num.val(200);
            $(this).addClass("unclick");
        }else{
            $buy_num.val(1 + _num++);
            $(".btn-reduce").removeClass("unclick");
        }
        
    });
    $buy_num.change(function(){
        console.log($buy_num.val());
        if($buy_num.val() > 200 ){
            $buy_num.val(200);
        }
    })
    $("#j-choose-amount").find(".btn-reduce").on("click", function () {
        _num = _num == 1 ? 1 : _num - 1;
        $buy_num.val(_num);
        if (_num == 1) {
            $(this).addClass("unclick");
        } else {
            $(this).removeClass("unclick");
        }
    });

    $(".tab-nav").find("li").bind("click", function () {
        $(".mod-fixed .tab-nav").find("li").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
        $(".mod-detail .tab-nav").find("li").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
        $(".i-line").stop().animate({left: $(".tab-nav li.cur").position().left}, 200);
        $(".tab-container").find(".tab-content").eq($(this).index()).addClass("act").siblings().removeClass("act");
        $('html, body').stop().animate({'scrollTop': $(".mod-detail .tab-nav").offset().top - 20}, 300);
    }).hover(function () {
        $(this).parents(".tab-nav").find(".i-line").stop().animate({left: $(this).position().left}, 200);
    }, function () {
        $(this).parents(".tab-nav").find(".i-line").stop().animate({left: $(".tab-nav li.cur").position().left}, 200);
    });

    /*滚动*/
    $(window).on("scroll", function () {
        if ($(document).scrollTop() > $("#j-detail").offset().top + 70) {
            $(".mod-fixed").stop().animate({top: 0}, 200, function () {
                $("#j-fixed-btn").stop().animate({right: 0}, 200)
            });
        }
        else {
            $("#j-fixed-btn").stop().animate({right: -149}, 200);
            $(".mod-fixed").stop().animate({top: -58}, 200);

        }
    });
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
    $(".item-prize").toggle(function(){
        $(this).addClass("active");
    },function(){
        $(this).removeClass("active");
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
   $("#j-zxCity").find("a").on("click",function () {
        var $txt = $(this).text();
        $("#more-item").hide();
        $("#j-province").find(".province-item em").text($txt);
   });
    $("#j-province-close").on("click",function () {
        $("#more-item").hide();
        return false;
    });
    $("#j-panel").on("click",function () {
        get_goods_bonus();
    });
    /*复制到剪切板*/
    var clipboard = new Clipboard('#j-sale-btn');

    clipboard.on('success', function(e) {
        alert("文字已复制到剪贴板中");
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
        alert("该浏览器不支持~请手动复制~");
    });
    /*评论*/
    var comment_li= $("#j-comment .search-list li");

    comment_li.find(".view-box li").live("click",function () {
        var src = $(this).children('img').attr('src');
        $(this).parents(".review-details").find(".view-clear img").attr('src',src);
        if(!$(this).hasClass("cur")){
            $(this).addClass("cur").siblings().removeClass("cur");
            $(this).parents(".review-details").find(".view-clear").hide().stop().slideDown(300);
        }else{
            $(this).removeClass("cur");
            $(this).parents(".review-details").find(".view-clear").stop().slideUp(300);
        }
    })
});
/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */

var clickobj=0;
function changePrice(t)
{   
    try{
        $(".showtz").remove();
    }catch(err){}
    // var attrStr  = '';
    $(t).parent().parent().children('li').removeClass('act');
    $(t).parent().parent().find('input').removeAttr('checked');

    $(t).prev().attr('checked','checked');
    $(t).parent().addClass('act');

    // $('.choose-box li[class=act]').each(function(){
    //     var isAttar = attrStr.length ? '<i>，</i>' : '';
    //     attrStr += isAttar + '<span>' + $(this).children('a').attr('attrName') + '</span>';
    // });

    // $already.find('.m-al').html(attrStr); 

    
    
    var attr    = getSelectedAttributes(document.forms['ECS_FORMBUY']);
    var qty     = 1;//document.forms['ECS_FORMBUY'].elements['number'].value;
    var url     = 'goods.php?act=price&id='+goodsId+'&attr='+attr+'&number='+qty+'&?';
    $.ajax({
        url: url,
        type: "GET",
        data: '',
        dataType: "json",
        cache: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            var cdkey=$("#cdkey").text();
            $('.prize-num').html('<i>¥</i>'+result.result);
            var cdkey_price=result.result-cdkey;
            cdkey_price = cdkey_price.toFixed(2);
            //alert(cdkey_price)
            $("#cdkey_price").text('￥'+cdkey_price);
            //alert($(".cdkey_price").text())
            //获取左边大图
            var goodsimg=$("#spec-n .main-img img").attr("src");
            //获取产品标题
            var goodstitle=$(".goods-name").text();
            //获取套装标题
            var tzitle=$(t).attr("title");
            //获取套装图片
            var ob_img = $(t).attr("img_url");
            //套装图片链接
            var href=$(t).attr("href_url");
            if(href.length <=0 ){
                href="javascript:void(0);"
            }
            var alljson=[{'goodsimg':goodsimg,'goodstitle':goodstitle},{'ob_img':ob_img,'tzitle':tzitle,'href':href}];
            if(ob_img){
                var findtz=$(t).parents("ul#findtz");
                if(findtz.length > 0){
                    writeDiv(t,alljson,result.result,cdkey_price);
                }else{
                    $("#spec-n .main-img img").attr('src',ob_img);  
                    $("#spec-n .main-img img").attr('jqimg',ob_img);
                    //$(".showtz_p1>img").attr("src",goodsimg);
                    clickobj=0;
                }
            }
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
}


function writeDiv(obj,alljson,allmoney,cdkey_price){
    var thisid=$(obj).parent("li").index()+1*1;
    if(thisid == clickobj){
        clickobj = 0;
    }else{
        var marginTop=$(obj).offset().top+$(obj).height()+3*1;
        var marginLedt=$(obj).offset().left;
        var divhtml="<div class='showtz' style='top:"+marginTop+"px;left:"+marginLedt+"px;'>";
            divhtml+="<div class='div_p'>";
            divhtml+="<p class='showtz_p1'><img src='"+alljson[0].goodsimg+"'><span>"+alljson[0].goodstitle+"</span></p>";
            divhtml+="<p class='showtz_p2'><img src='/images/jiahao.png'></p>";
            divhtml+="<p class='showtz_p3'><a target='_blank' href='"+alljson[1].href+"'><img src='"+alljson[1].ob_img+"' /></a><span>"+alljson[1].tzitle+"</span></p>"
            divhtml+="</div>";
            divhtml+="<p class='showtz_p4'>套装价 : <b> ￥ "+allmoney+"</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;兑换价: <b> ￥ "+cdkey_price+"</b></p>"
            divhtml+="</div> "
        $("body").append(divhtml);
        clickobj = thisid;
    }
}
/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice_onload()
{
    var attr    = getSelectedAttributes(document.forms['ECS_FORMBUY']);
    var qty     = 1;//document.forms['ECS_FORMBUY'].elements['number'].value;
    var url     = 'goods.php?act=price&id='+goodsId+'&attr='+attr+'&number='+qty+'&?';
    $.ajax({
        url: url,
        type: "GET",
        data: '',
        dataType: "json",
        cache: false,
        async: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            $('.prize-num').html('<i>¥</i>'+result.result);
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
    // var attrStr  = '';
    // $('.choose-box li[class=act]').each(function(){
    //     var isAttar = attrStr.length ? '<i>，</i>' : '';
    //     attrStr += isAttar + '<span>' + $(this).children('a').attr('attrName') + '</span>';
    // });
    // $already.find('.m-al').html(attrStr); 
}
/**
 * 获得选定的商品属性
 */
function getSelectedAttributes(formBuy)
{
  var spec_arr = new Array();
  var j = 0;

  for (i = 0; i < formBuy.elements.length; i ++ )
  {
    var prefix = formBuy.elements[i].name.substr(0, 5);
    if (prefix == 'spec_' && (
      ((formBuy.elements[i].type == 'radio' || formBuy.elements[i].type == 'checkbox') && formBuy.elements[i].checked) ||
      formBuy.elements[i].tagName == 'SELECT'))
    {
      spec_arr[j] = formBuy.elements[i].value;
      j++ ;
    }
  }

  return spec_arr;
}
//添加到购物车
function addToCart(goodsId,type,catid){
    var goods        = new Object();
    var spec_arr     = new Array();
    var fittings_arr = new Array();
    var number       = 1;
    var formBuy      = document.forms['ECS_FORMBUY'];
    var quick        = 0;
    var url          = 'flow.php?step=add_to_cart';
    // 检查是否有商品规格 
    if (formBuy){
        spec_arr = getSelectedAttributes(formBuy);

        if (formBuy.elements['number'])
        {
          number = formBuy.elements['number'].value;
        }

        quick = 1;
    }
    //流量
    if(catid == 313){
        var phone=$("input[name='phone']").val();
        var reg=/^1[3578]{1}[0-9]{9}$/;
        if(!reg.test(phone)){
            layer.msg('请先正确填写您的电话!');
            return false;
        }
        goods.phone    = phone;
    }
    goods.quick    = quick;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.type     = type;
    goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
    var data       = JSON.stringify(goods);
    $.ajax({
        url: url,
        type: "POST",
        data: {goods:data},
        dataType: "json",
        cache: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            if(goodsId == 1379 || goodsId==1382 ){
                $(".xjts").css({"display":'block'});
            }else{
                addToCartResponse(result,type);
            }
            
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
}
/* *
 * 处理添加商品到购物车的反馈信息
 */
function addToCartResponse(result,type){
    if (result.error > 0){
        // 如果需要缺货登记，跳转
        if (result.error == 2)
        {
          if (confirm(result.message))
          {
            location.href = 'user.php?act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
          }
        }
        // 没选规格，弹出属性选择框
        else if (result.error == 6)
        {
            layer.msg(result.message[0]);
        }else{
            //console.log(result.message);
            layer.msg(result.message[0]);
        }
      }
      else
      {
        if(type == 1){
            if(result.not_login != undefined && result.not_login == 1){
                layer.msg('请先登录',{time:2000},function(){
                    //关闭后的操作
                    login();
                    $('#loginForm #back_act').val('flow.php?step=checkout');
                    $('.oth_logins a').eq(0).attr('href','user.php?act=oath&type=weixin&callblock=flow.php?step=checkout');
                    $('.oth_logins a').eq(1).attr('href','user.php?act=oath&type=qq&callblock=flow.php?step=checkout');
                    $('.oth_logins a').eq(2).attr('href','user.php?act=oath&type=weibo&callblock=flow.php?step=checkout');
                });
            }else{
               location.href = 'flow.php?step=checkout'; 
            }
        }else{
            layer.msg('已加入购物车');
            // addToCartShow();
        }
        $('.cart-size').text('(' + result.content + ')');
    }
}
/**
 * 添加效果装逼效果
 */
function addToCartShow(){
    var cart = $('.aor');
    var imgtodrag = $(".jqzoom").find("img").eq(0);
    if (imgtodrag) {
        var imgclone = imgtodrag.clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    'opacity': '0.8',
                    'position': 'absolute',
                    'height': '360px',
                    'width': '360px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': cart.offset().top,
                    'left': cart.offset().left,
                    'width': 40,
                    'height': 40,
                    opacity: 0.2
                }, 1000);

        imgclone.animate({
            'width': 0,
            'height': 0
        }, function () {
            $(this).detach()
        });
    }
}
/**
 * 获得选定的商品属性
 */
function getSelectedAttributes(formBuy)
{
    var spec_arr = new Array();
    var j = 0;

    for (i = 0; i < formBuy.elements.length; i ++ ){
        var prefix = formBuy.elements[i].name.substr(0, 5);

        if (prefix == 'spec_' && (
          ((formBuy.elements[i].type == 'radio' || formBuy.elements[i].type == 'checkbox') && formBuy.elements[i].checked) ||
          formBuy.elements[i].tagName == 'SELECT')){
          spec_arr[j] = formBuy.elements[i].value;
          j++ ;
        }
    }

  return spec_arr;
}
/* *
 * 添加商品到收藏夹
 */
function collect(goodsId)
{
    var url = 'user.php?act=collect';
    $.ajax({
        url: url,
        type: "GET",
        data: {id : goodsId},
        dataType: "json",
        cache: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            layer.msg(result.message);
            if(result.error == 0){
                $('.m-collect').toggleClass('act');
            }
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
}
/**
 * 点选地区改变邮费
 */
function changeShipping(city)
{
    var province = $('#j-mui-province .mui_addr_selected').attr('value');
    var url      = 'goods.php?act=shipping&id='+goodsId+'&province='+province+'&city='+city+'&?';
    $.ajax({
        url: url,
        type: "GET",
        data: '',
        async: false,
        dataType: "json",
        cache: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            $('.postage span').eq(0).html(result.result);
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
}
//切换地址
function getarea(id,typeid){
    var url  = "region.php";
    var str  = '';
    if(!id || !typeid){return false;}
    $.ajax({
        url: url,
        type: "GET",
        data: {type:typeid,target:'selCities_2',parent:id},
        dataType: "json",
        cache: false,
        beforeSend: function() {
            layer.load(2);
        },
        success: function(data) {
            $.each(data.regions,function(i,item){
               str += '<li ><a href="javascript:void(0);" region_id="'+item.region_id+'">'+item.region_name+'</a></li>';
            });
             $(".mui_addr_Sup2box ul").empty().append(str);
        },
        complete: function() {
            layer.closeAll('loading');
        }
    });
}
/**
 * 获取红包序列号
 * @param string bonusSn 红包序列号
 */
function get_goods_bonus()
{
  var submit  = $(".panel #sale-code");
  var url     = 'api/goods.php?'+paramStr;
  $.ajax({
      url: url,
      type: "POST",
      data:'',
      dataType: "json",
      cache: false,
      beforeSend: function() {
          layer.load(2);
          submit.prop("disabled", true);
      },
      success: function(re) {
            if(re.result == 'true'){
                //关闭后的操作
                $('#j-sale-dia .sale-code').html(re.data);
                $("#j-sale-dia").fadeIn(200).find(".dia-close").on("click",function () {
                    $("#j-sale-dia").fadeOut(200);
                });
                
            }else{
                layer.msg(re.data);
            }
            submit.prop("disabled", false);
      },
      complete: function() {
          layer.closeAll('loading');
      }
  });
}
/* *
 * 评论的翻页函数
 */
function gotoPage(page, id, type,pic)
{
    if(!pic) pic = 0;
    var url      = 'comment.php?act=gotopage';
    $.ajax({
      url: url,
      type: "GET",
      data: 'page=' + page + '&id=' + id + '&type=' + type + '&pic=' +pic,
      dataType: "json",
      cache: false,
      beforeSend: function() {
          layer.load(2);
      },
      success: function(re) {
        gotoPageResponse(re);
      },
      complete: function() {
        layer.closeAll('loading');
      }
  });
}
function gotoPageResponse(result)
{
  document.getElementById("j-comment").innerHTML = result.content;
}
$("#spec-list li img").hover(function() {
    $("#spec-list li img").removeClass("checked");
    $(this).addClass("checked");
})