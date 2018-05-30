//底部往上拉
function pageScroll() {
    $('body,html').animate({scrollTop: 0}, 500);
}

$(window).load(function() {
    /*登录注册点击*/
    $("#dl").click(login);
    $("#regi").click(register);
    /*导航全部商品出现*/
    if($('.nav_box ul').hasClass('sn_nav_two')){
        $('.nav_box .all_pro').hover(function(){
           $('.nav_box .all_pro .sn_nav').removeClass('disn')
        },function(){
            $('.nav_box .all_pro .sn_nav').addClass('disn')
        });       
    }
    $(".registered-fast").click(function(){
        $(".modal-main-c").show();
        $(".modal-main-c-2").hide();
        modalShow();
    });
    $(".login-fast").click(function(){
        $(".modal-main-c-2").show();
        $(".modal-main-c").hide();
        modalShow();
    });
    /*加入收藏*/
    $("#j-collect").find('.tip-txt i').on("click", function () {
        $(".tip-txt").hide();
    });

    // 关闭弹窗
    $('.colse-btn').click(function() {
        $('.modal,.modal-main').hide();
        $(".modal-main-c").hide();
        $(".modal-main-c-2").hide();
    });

    // 显示弹窗
    $('.contact-us').click(function() {
        $('.modal,.modal-main-qq').show();
        modalShowQQ()
    });
    // 关闭弹窗
    $('#wpa3-select-panel-close').click(function() {
        $('.modal,.modal-main-qq').hide();
    });

    // 客服显示弹窗
    $('.service-qq a,.service-qq').click(function() {
        $('.modal,.modal-main').show();
        $('.wpa3-select-panel').show();
        modalShow();
    });
    // 客服关闭弹窗
    $('#wpa3-select-panel-close').click(function() {
        $('.modal,.modal-main').hide();
        $('.wpa3-select-panel').hide();
    });
    /*首页tip*/
    $("#notice-tip").find(".close").on("click",function () {
        $("#notice-tip").hide().parents(".head-right").find(".head i").hide();
        document.setCookie('isMessageShow','1');
    })
    var isNoticeShow = document.getCookie('isNoticeShow');
    if(!isNoticeShow){
        $("#holiday-notice").fadeIn(200);
    }
    /*
    // 显示弹窗
    $('#BizQQWPA a').click(function() {
        $('.modal,.modal-main').show();
        modalShow();
    });
    // 关闭弹窗
    $('#wpa3-select-panel-close').click(function() {
        $('.modal,.modal-main').hide();
    });*/
    // 窗口调整时调整位置
    $(window).on('resize',function(){
        modalShow();
    });
});

$(function(){
    $('.nav_box .all_pro .sn_nav li.nav_li').hover(function(){
        $(this).children('.nav_content').show();
    },function(){
        $(this).siblings().children('.nav_content').hide();
        $(this).children('.nav_content').hide();
    });

    $('.service-suspend ul li .service-content.service-ewm').hover(function(){
        $('.service-suspend ul li .service-ewm-c').show();
    },function(){
        $('.service-suspend ul li .service-ewm-c').hide();
    })

    $('.service-suspend ul li .service-content.service-top').click(function(){
        pageScroll()
    });
    
    $('.service-suspend ul li .service-content.service-phone').hover(function(){
        $('.service-suspend ul li .service-phone-c').show();
    },function(){
        $('.service-suspend ul li .service-phone-c').hide();
    })
    $("#holiday-notice").on("click",function () {
        document.setCookie('isNoticeShow',1);
        $(this).fadeOut(200);
    });
    // var moveXXX = function(){
    //     var myTop = $(window).scrollTop();
    //     if(myTop >=280){
    //         $(".service-suspend").addClass("rightx_hover");
    //     }
    //     if(myTop <=280){
    //         $(".service-suspend").removeClass("rightx_hover");
    //     }};
    // $(window).bind("scroll", moveXXX);
});
// 验证
if ($.validator != null) {
    $.extend($.validator.messages, {
        required: '必填',
        email: 'E-mail格式错误',
        url: '网址格式错误',
        date: '日期格式错误',
        dateISO: '日期格式错误',
        pointcard: '信用卡格式错误',
        number: '只允许输入数字',
        digits: '只允许输入零或正整数',
        minlength: $.validator.format('长度不允许小于{0}'),
        maxlength: $.validator.format('长度不允许大于{0}'),
        rangelength: $.validator.format('长度必须在{0}-{1}之间'),
        min: $.validator.format('不允许小于{0}'),
        max: $.validator.format('不允许大于{0}'),
        range: $.validator.format('必须在{0}-{1}之间'),
        accept: '输入后缀错误',
        equalTo: '两次输入不一致',
        remote: '输入错误',
        integer: '只允许输入整数',
        positive: '只允许输入正数',
        negative: '只允许输入负数',
        decimal: '数值超出了允许范围',
        pattern: '格式错误',
        extension: '文件格式错误'
    });
    $.validator.setDefaults({
        errorClass: "fieldError",
        ignore: ".ignore",
        ignoreTitle: true,
        errorPlacement: function(error, element) {
            var fieldSet = element.closest("span.fieldSet");
            if (fieldSet.size() > 0) {
                error.appendTo(fieldSet);
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            $(form).find("input:submit").prop("disabled", true);
            form.submit();
        }
    });
}
$().ready(function() {
    // 登录验证
    var loginForm   = $("#loginForm");
    var submit      = $("#btnSubmit");
    // 注册验证
    var $registerForm   = $("#registerForm");
    var $username       = $("#username");
    var $password       = $("#password");
    var $email          = $("#email");
    var $captcha        = $("#captcha");
    var $captchaImage   = $("#captchaImage");
    var $submit         = $("input:submit");
    var $agreement      = $("#agreement");
    // 表单验证
    loginForm.validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
            captcha:{
                required: true,
            }
        },
        messages: {
            username: "必填",
            password: "必填",
            captcha: "必填"
        },
        submitHandler: function(form) {
            $.ajax({
                url: loginForm.attr("action"),
                type: "POST",
                data:loginForm.serialize(),
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    layer.load(2);
                    submit.prop("disabled", true);
                },
                success: function(data) {
                    if(data.error){
                        layer.msg(data.content);
                        if(data.enabled_captcha || $('#loginForm #captchaImage') != undefined){
                            $('.yzm').show();
                            $('#loginForm #captcha').removeAttr("disabled");
                            $('#loginForm #captchaImage').attr("src", "captcha.php?is_login=1" + Math.random());
                        }
                    }else{
                        //关闭后的操作
                        location.href = $("#back_act").val();
                    }
                },
                complete: function() {
                    submit.prop("disabled", false);
                    layer.closeAll('loading');
                }
            });
        }
    });
    // 表单验证
    $registerForm.validate({
        rules: {
            username: {
                required: true,
                pattern: /^[0-9a-zA-Z_\u4e00-\u9fa5]+$/,
                minlength: 3,
                remote: {
                    url: "user.php?act=is_registered",
                    cache: false
                }
            },
            password: {
                required: true,
                minlength: 6
            },
            rePassword: {
                required: true,
                equalTo: "#password_2"
            },
            email: {
                required: true,
                email: true
                    ,remote: {
                        url: "user.php?act=check_email",
                        cache: false
                    }
            },
            captcha: "required"
        },
        messages:{
            username:{
                required:"必填",
                minlength:"用户名最小为6位",
                maxlength:"用户名最大为20位",
                remote: "用户名被禁用或已被注册"
            },
            password:{
                required:"必填",
                minlength:"密码最小为6位",
                maxlength:"密码最大为16位"
            },
            captcha:{
                required:"必填"
            },
            email:{
                required:"必填",
                email:"E-Mail格式不正确",
                remote: "E-mail已被注册"
            },
            "rePassword":{
                required:"必填",
                equalTo:"两次输入密码不一致"
            },
            phone:{
                required:"必填",
                pattern:"输入正确手机号格式"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                url: $registerForm.attr("action"),
                type: "POST",
                data: $registerForm.serialize(),
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    layer.load(2);
                    $submit.prop("disabled", true);
                },
                success: function(data) {
                    if (data.status == "1") {
                        layer.msg(data.message);
                        setTimeout(function() {
                                location.href = "/";
                        }, 2000);
                    } else {
                        layer.msg(data.message);
                        $('#registerForm #captcha').val("");
                        $('#registerForm #captchaImage').attr("src", "captcha.php?" + Math.random());
                    }
                },
                complete: function() {
                    $submit.prop("disabled", false);
                    layer.closeAll('loading');
                }
            });
        }
    });
});
/*↓↓↓↓↓↓↓↓服务协议↓↓↓↓↓↓↓↓↓*/
function closePopupLayer() {
    $(".popup").hide();
    $(".keepOut").hide();
}
function openStaticPopup() {
    //$(".modal").show();
    $('.modal-main-c-2').hide();
    var hei = $("body").height();
    var wid = $("body").width();
    var pophei = $(".popup").height();
    var popwid = $(".popup").width();
    var thetop = (hei - pophei) / 2;
    var theleft = (wid - popwid) / 2;
    thetop=thetop-67;
    $(".popup").css({
        "display" : "block",
        "top" : thetop,
        "left" : theleft
    });

}
function closePopupLayer() {
    $(".popup").hide();
    $(".modal-main-c-2").show();
    modalShow();
}
function login(){
    $('.modal,.modal-main').show();
    $(".modal-main-c").show();
    $(".modal-main-c-2").hide();
    if($('#loginForm #captchaImage') != undefined){
        $('#loginForm #captchaImage').attr('src','captcha.php?is_login=1&?'+ Math.random());
    }
    modalShow();
};
function register(){
    $('.modal,.modal-main').show();
    $(".modal-main-c-2").show();
    $(".modal-main-c").hide();
    $('#registerForm #captchaImage').attr('src','captcha.php?'+ Math.random());
    modalShow();
};
function modalShow(){
    $win = $(window),
        $ww = $win.width(), // 屏幕宽度
        $wh = $win.height();  // 屏幕高度
    var oModal = $('.modal-main');
    var logW = oModal.width(),//获取元素宽度；
        logH = oModal.height();//获取元素高度；
    oModal.css({
        'position': logH >= $wh ? 'absolute': 'fixed',
        'left': (($ww - logW) / 2),
        'top': (logH >= $wh ? $(document).scrollTop() : ($wh-logH)/2),
        'margin':(logH >= $wh ? '10px auto' : false)
    });
};
document.getCookie = function(sName)
{
  // cookies are separated by semicolons
  var aCookie = document.cookie.split("; ");
  for (var i=0; i < aCookie.length; i++)
  {
    // a name/value pair (a crumb) is separated by an equal sign
    var aCrumb = aCookie[i].split("=");
    if (sName == aCrumb[0])
      return decodeURIComponent(aCrumb[1]);
  }

  // a cookie with the requested name does not exist
  return null;
}

document.setCookie = function(sName, sValue, sExpires)
{
  var sCookie = sName + "=" + encodeURIComponent(sValue);
  if (sExpires != null)
  {
    sCookie += "; expires=" + sExpires;
  }

  document.cookie = sCookie;
}

document.removeCookie = function(sName,sValue)
{
  document.cookie = sName + "=; expires=Fri, 31 Dec 1999 23:59:59 GMT;";
}

$(window).load(function() {
    /*顶部广告位*/
    if($("#top-fix-02").length > 0){
       $(window).on("scroll", function () {
            if ($(document).scrollTop() > $("#top-fix").offset().top + 140) {
                $("#top-fix-02").stop().animate({top: 0}, 300, function () {
                });
            }
            else {
                $("#top-fix-02").stop().animate({top: -120}, 300);
            }
        }); 
        $(".top-fix .close").click(function(){
            $("#top-fix-02").hide();
        });    
    }
});
