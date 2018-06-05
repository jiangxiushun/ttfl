<html>
<head>
<meta name="Generator" content=" " />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="我要天天福利" />
    <meta name="Description" content="我要天天福利" />
    <title>用户中心-签到</title>
    <link href="http://images.51ttfl.com/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="/Home/css/reset.css">
    <link rel="stylesheet" href="/Home/css/login.css">
    <script src="/Home/js/jquery.js"></script>
    <script src="/Home/js/jquery.validate.js"></script>
</head>
<body>

<div class="header">
    <div class="logo">
        <a href="index.php"><img src="/Home/picture/logo.png"></a>
    </div>
    <div class="act_imgs" style="right: 0px;">
        <img src="/Home/picture/act2.png">
    </div>
</div>
<div class="login_cons">
    <div class="cons_tainer">
        <img src="/Home/picture/login_bg.jpg" class="cos_ims">
        <div class="login_form">
            <form id="loginForm" action="user.php" method="post" novalidate="novalidate">
                <div class="forms">
                    <div class="oth_logins">
                        <h2><span class="lie"></span><span class="zc">免注册，一键登录</span></h2>
                        <div class="login_icons">
                            <a class="lg_qq" href="user.php?act=oath&type=qq&callblock="></a>
                            <a href="user.php?act=oath&type=weibo&callblock=" class="lg_sina"></a>
                            <a href="user.php?act=oath&type=weixin&callblock=" class="lg_wx"></a>
                        </div>
                    </div>
                    <h1><a href="user.php?act=register" class="gotoRegister">立即免费注册 <i></i></a>登录天天福利</h1>
                    <div class="fo_inp">
                        <span></span>
                        <input type="text" id="username" name="username" class="name valid" value="" maxlength="200" placeholder="请输入账户名" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="fo_inp">
                        <span class="ps_ico"></span>
                        <input type="password" id="password" name="password" class="pas valid" value="" placeholder="请输入密码" maxlength="200" autocomplete="off" aria-required="true" aria-invalid="false">
                    </div>
                    <div id="div_captcha" class="fo_inp fo_inp3 div_cap">
                        <input type="text" id="captcha" name="captcha" disabled="disabled" class="captcha" maxlength="4" autocomplete="off" placeholder="请输入验证码"><img id="captchaImage" class="captchaImage"  title="点击更换验证码" onClick="this.src='/Home/picture/captcha.php'+Math.random()">
                    </div>
                    <div class="fo_inp2">
                        <input type="checkbox" id="isRememberUsername" name="remember" value="checkbox">
                        <label for="isRememberUsername">保存登录信息</label>
                        <a href="user.php?act=get_password" class="forget">忘记密码？</a>
                    </div>
                    <input type="submit" name="" class="login_subs submit" value="登   录">
                    <input type="hidden" name="act" value="signin" />
                    <input type="hidden" name="back_act" id="back_act" value=""/>
                </div>
            </form>
        </div>
        <img class="form_sd" src="/Home/picture/lg1.png">
    </div>
</div>


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
             
                <a href="article.php?id=5"  title="公司简介" >公司简介</a>
             
                <a href="article.php?id=1"  title="免责条款" >免责条款</a>
             
                <a href="article.php?id=2"  title="隐私保护" >隐私保护</a>
             
                <a href="article.php?id=24"  title="常见问题" >常见问题</a>
             
                <a href="article.php?id=4"  title="联系我们" >联系我们</a>
                        <p class="mgt">Copyright ©2016 深圳市智盈优创网络科技有限公司51ttfl.com All Rights Reseryved&nbsp粤ICP备16046348号-1&nbsp;</p>
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
<div class="modal"></div>
<div class="modal-main">
    <div class="modal-main-c">
        <i class="colse-btn"></i>
        <div class="hd">
            <div class="dl-logo"></div>
            <h3>账号登录</h3>
        </div>
        <div class="bd">
            
            <form id="loginForm" action="user.php" method="post" novalidate onSubmit="return false">
                <input type="hidden" name="act" value="signin" />
                <input type="hidden" id="back_act" name="back_act" value=''/>
                <div class="div_input">
                    <input class="input_text" id="username" name="username"  placeholder="请输入账户名" type="text">
                </div>
                <div class="div_input">
                    <input class="input_text" id="password" name="password" placeholder="请输入密码" type="password">
                </div>
                <div class="yzm clearfix" style="display:none">
                    <input type="text" id="captcha" name="captcha" disabled="disabled" class="captcha" maxlength="4" autocomplete="off" placeholder="请输入验证码">
                    <span class="span_yzm">
                        <img id="captchaImage" class="captchaImage" src="" title="点击更换验证码" onClick="this.src='captcha.php?is_login=1&'+Math.random()" style="vertical-align:top;cursor: pointer;width: 80px;height: 36px;">
                    </span>
                </div>
                <div class="div_save clearfix">
                    <div class="save-news">
                        <label>
                            <input type="checkbox" id="isRememberUsername" class="check" name="remember" checked="" value="checkbox">
                            <span class="s0">保存登录信息</span>
                        </label>
                    </div>
                    <div class="forget-ps"><a href="user.php?act=get_password" target="" title="">忘记密码?</a></div>
                </div>
                <div class="div_login">
                    <input class="submit" type="submit" id="loginSubmit" value="立即登录" />
                </div>
                <div class="oth_logins">
                    <h2><span class="lie"></span><span class="zc">免注册，一键登录</span></h2>
                    <div class="login_icons clearfix">
                        <a href="user.php?act=oath&type=weixin&callblock=" class="lg_wx"></a>
                        <a class="lg_qq" href="user.php?act=oath&type=qq&callblock="></a>
                        <a href="user.php?act=oath&type=weibo&callblock=" class="lg_sina"></a>
                    </div>
                </div>
                <div class="div_no_zh">
                    还没有账号?<a href="javascript:;" title="" target="" class="login-fast">点击注册</a>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-main-c-2">
        <i class="colse-btn"></i>
        <div class="hd">
            <div class="dl-logo"></div>
            <h3>账号注册</h3>
        </div>
        <div class="bd">
            <form action="user.php" name="formUser" id="registerForm" method="post">
                <input name="act" type="hidden" value="ajax_register" >
                <div class="div_input">
                    <input class="input_text" id="username_2" name="username"  placeholder="请输入账户名" type="text">
                </div>
                <div class="div_input">
                    <input class="input_text" id="password_2" name="password" placeholder="请输入6-16位密码" type="password">
                </div>
                <div class="div_input">
                    <input class="input_text" id="rePassword" name="rePassword" placeholder="请确认输入密码" type="password">
                </div>
                <div class="div_input">
                    <input class="input_text" id="email" name="email"  placeholder="请输入邮箱" type="text">
                </div>
                <div class="yzm clearfix">
                    <input class="input_text captcha" id="captcha" name="captcha"  placeholder="请输入验证码" type="text">
                    <span class="span_yzm">
                          <img id="captchaImage" src="" onClick="this.src='captcha.php?'+Math.random()" style="vertical-align:top;cursor: pointer;width: 80px;height: 36px;">
                    </span>
                </div>
                <div class="futk">
                    <label>
                        <input type="checkbox" onclick="return false;" class="check" checked="checked" value="1" name="agreement">
                        <span class="s0"></span>
                    </label>
                    <label style="width: 260px;font-size: 14px;color: #848484;">我已阅读并接受</label>
                    <label class="brown" style="width: 84px;"><a href="javascript:;" onclick="openStaticPopup()" style="color: #67a4db">《我要天天福利商城服务协议条款》</a>
                    </label>
                </div>
                <div class="div_login">
                    <input class="submit" type="submit"  value="立即注册" />
                </div>
                <div class="div_no_zh">
                    已有账号?<a href="javascript:;" title="" target="" class="registered-fast">马上登录</a>
                </div>
            </form>
        </div>
    </div>
    <div class="wpa3-select-panel">
        <div class="wpa3-select-panel-top">
            <a id="wpa3-select-panel-close" href="javascript:;" class="wpa3-select-panel-close"></a>
        </div>
        <div class="wpa3-select-panel-main">
            <p class="wpa3-select-panel-guide">请选择发起聊天的方式：</p>
            <div class="wpa3-select-panel-selects">
                            <a id="wpa3-select-panel-aio-chat" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2587743823&site=qq&menu=yes" class="wpa3-select-panel-chat wpa3-select-panel-aio-chat">
                    <span class="wpa3-select-panel-qq wpa3-select-panel-qq-anony"></span>
                    <span class="wpa3-select-panel-label">客服</span>
                </a>
                        </div>
        </div>
        <div class="wpa3-select-panel-bottom">
            <a target="_blank" href="http://im.qq.com" class="wpa3-select-panel-install">安装qq</a>
        </div>
    </div>
</div>
<div class="popup">
    <div class="popup_header">我要天天福利商城服务协议</div>
    <div class="popup_body">
        <div class="con">
            <b>一、本站服务条款的确认和接纳</b>
            <p>本站的各项电子服务的所有权和运作权归本站。本站提供的服务将完全按照其发布的服务条款和操作规则严格执行。用户同意所有服务条款并完成注册程序，才能成为本站的正式用户。用户确认：本协议条款是处理双方权利义务的约定，除非违反国家强制性法律，否则始终有效。在下订单的同时，您也同时承认了您拥有购买这些产品的权利能力和行为能力，并且将您对您在订单中提供的所有信息的真实性负责。</p>
            <b>二、服务简介</b>
            <p>本站运用自己的操作系统通过国际互联网络为用户提供网络服务。同时，用户必须：</p>
            <ul>
                <li>(1)自行配备上网的所需设备，包括个人电脑、调制解调器或其它必备上网装置。</li>
                <li>(2)自行负担个人上网所支付的与此服务有关的电话费用、网络费用。</li>
            </ul>
            <p>基于本站所提供的网络服务的重要性，用户应同意</p>
            <ul>
                <li>(1)提供详尽、准确的个人资料。</li>
                <li>(2)不断更新注册资料，符合及时、详尽、准确的要求。</li>
            </ul>
            <p>本站不公开用户的姓名、地址、电子邮箱和笔名，除以下情况外：</p>
            <ul>
                <li>(1)用户授权本站透露这些信息。</li>
                <li>(2)相应的法律及程序要求本站提供用户的个人资料。</li>
            </ul>
            <b>三、价格和数量</b>
            <p>本站将尽最大努力保证您所购商品与网站上公布的价格一致。</p>
            <p>产品的价格和可获性都在本站上指明，这类信息将随时更改。</p>
            <p>您所订购的商品，如果发生缺货，您有权取消定单。</p>
            <b>四、送货及费用</b>
            <p>本站将会把产品送到您所指定的送货地址。所有在本站上列出的送货时间为参考时间，参考时间的计算是根据库存状况、正常的处理过程和送货时间、送货地点的基础上估计得出的。送货费用根据您选择的配送方式的不同而异。</p>
            <p>请清楚准确地填写您的真实姓名、送货地址及联系方式。因如下情况造成订单延迟或无法配送等，本站将不迟延配送的责任：</p>
            <ul>
                <li>(1)客户提供错误信息和不详细的地址；</li>
                <li>(2)货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。</li>
                <li>(3)不可抗力，例如：自然灾害、交通戒严、突发战争等。</li>
            </ul>
            <b>五、服务条款的修改</b>
            <p>本站将可能不定期的修改本用户协议的有关条款，一旦条款及服务内容产生变动，本站将会在重要页面上提示修改内容。</p>
            <b>六、用户隐私制度</b>
            <p>尊重用户个人隐私是本站的一项基本政策。所以，作为对以上第二点人注册资料分析的补充，本站一定不会在未经合法用户授权时公开、编辑或透露其注册资料及保存在本站中的非公开内容，除非有法律许可要求或本站在诚信的基础上认为透露这些信件在以下四种情况是必要的。</p>
            <b>七、用户的帐号，密码和安全性 </b>
            <p>用户一旦注册成功，成为本站的合法用户，将得到一个密码和用户名。您可随时根据指示改变您的密码。用户需谨慎合理的保存、使用用户名和密码。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通知本站和向公安机关报案。</p>
            <b>八、对用户信息的存储和限制</b>
            <p>本站有判定用户的行为是否符合国家法律法规规定及本站服务条款权利，如果用户违背了国家法律法规规定或服务条款的规定，本站有中断对其提供网络服务的权利。</p>
            <b>九、用户管理 </b>
            <p>用户单独承担发布内容的责任。用户对服务的使用是根据所有适用于本站的国家法律、地方法律和国际法律标准的。用户必须遵循：</p>
            <ul>
                <li>(1)从中国境内向外传输技术性资料时必须符合中国有关法规。</li>
                <li>(2)使用网络服务不作非法用途。</li>
                <li>(3)不干扰或混乱网络服务。</li>
                <li>(4)遵守所有使用网络服务的网络协议、规定、程序和惯例。</li>
            </ul>
            <p>用户须承诺不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐性的、伤害性的、庸俗的，淫秽等信息资料。另外，用户也不能传输何教唆他人构成犯罪行为的资料；不能传输助长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法律和国际法律的资料。未经许可而非法进入其它电脑系统是禁止的。</p>
            <p>若用户的行为不符合以上提到的服务条款，本站将作出独立判断立即取消用户服务帐号。用户需对自己在网上的行为承担法律责任。用户若在本站上散布和传播反动、色情或其它违反国家法律的信息，本站的系统记录有可能作为用户违反法律的证据。</p>
            <b>十、通告</b>
            <p>所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。用户协议条款的修改、服务变更、或其它重要事件的通告都会以此形式进行。</p>
            <b>十一、参与广告策划</b>
            <p>用户在他们发表的信息中加入宣传资料或参与广告策划，在本站的免费服务上展示他们的产品，任何这类促销方法，包括运输货物、付款、服务、商业条件、担保及与广告有关的描述都只是在相应的用户和广告销售商之间发生。</p>
            <b>十二、网络服务内容的所有权</b>
            <p>本站定义的网络服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；电子邮件的全部内容；本站为用户提供的其它信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在本站和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。本站所有的文章版权归原文作者和本站共同所有，任何人需要转载本站的文章，必须征得原文作者或本站授权。
            </p>
            <b>十三、责任限制</b>
            <p>如因不可抗力或其它本站无法控制的原因使本站销售系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等本站会尽可能合理地协助处理善后事宜，并努力使客户免受经济损失。</p>
            <b>十四、法律管辖和适用</b>
            <p>本协议的订立、执行和解释及争议的解决均应适用中国法律。</p>
            <p>如发生本站服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它合法条款则依旧保持对用户产生法律效力和影响。</p>
            <p>本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</p>
            <p>如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向本站所在地的人民法院提起诉讼。</p>
        </div>
    </div>
    <div class="popup_close">
        <a href="javascript:;" onclick="closePopupLayer()" title="关闭窗口">阅读完毕，关闭窗口</a>
    </div>
</div>

<style type="text/css">
.tc{position:fixed;right:20px;bottom:-250px;width:400px;height:215px;border:1px solid #e4e4e4;border-radius: 5px;background: white;z-index: 9999;
     }
.tt{width:80%;height:35px;line-height: 35px;margin:0 auto;text-align: center;margin-top:20px;}
.tt a{color:#ff6700;font-size: 16px;}
.cont a{font-size: 15px;}
.cont{width:80%;height:25px;line-height: 25px;margin:0 auto;font-size: 15px;}
.close_tc{position:absolute;right:5px;top:5px;background:url("../images/close_tc.png") no-repeat;
background-size:100% 100%;display:block;width:15px;height:15px;cursor:pointer;}
</style>
<div class="tc">
    <span class="close_tc"></span>
    <p class="tt"><a href="http://www.51ttfl.com/article.php?id=40" title="点击查看">尊敬的用户，您好！</a></p>
    <p class="cont"><a href="http://www.51ttfl.com/article.php?id=40"  title="点击查看" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中秋国庆双节到来10月1日-10月8日快递、工厂、客服人员放假休息。本商城正常下单，发货时间将顺延到节后，期间有任何问题您可以在线QQ客服上留言，上班第一时间回复处理。给您带来的不便我们深感抱歉，敬请谅解，祝双节快乐！</a></p>
</div>
<script type="text/javascript">
function getsec(str){
    var str1=str.substring(1,str.length)*1;
    var str2=str.substring(0,1);
    if (str2=="s"){
        return str1*1000;
    }else if (str2=="h"){
        return str1*60*60*1000;
    }else if (str2=="d"){
        return str1*24*60*60*1000;
    }
}
function setCookie(name,value,time){
    var strsec = getsec(time);
    var exp = new Date();
    exp.setTime(exp.getTime() + strsec*1);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
function getCookie(name){
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
    return unescape(arr[2]);
    else
    return null;
}
function delCookie(name){
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
    document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}
function close_tc(){
    $(".tc").animate({"bottom":'-250px'},1000);
}
$(function(){
    var i=1;
    if(i){
       var is_cook=getCookie("tongzhi");
        if(!is_cook){
            //$(".tc").animate({"bottom":'20px'},1000);
            $(".close_tc").click(function(){
                close_tc();
            })
            //setTimeout('close_tc()',10000);
            setCookie('tongzhi','tongzhi','s600');
        }
    }
    
})    
</script>



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
                        <div class="current-date" style="padding-top:20px;">2018-05-25</div>
                        <!-- <div class="qiandao-history qiandao-tran qiandao-radius" id="js-qiandao-history">我的签到</div> -->
                    </div>
                    <div class="qiandao-main" id="js-qiandao-main">
                        <ul class="qiandao-list" id="js-qiandao-list">
                                                            <li class="date ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date1 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date2 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date3 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date4 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date5 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date6 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date7 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date8 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date9 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date10 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date11 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date12 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date13 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date14 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date15 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date16 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date17 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date18 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date19 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date20 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date21 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date22 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date23 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date24 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date25 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date26 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date27 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date28 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date29 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date30 ">
                                    <div class="qiandao-icon"></div>
                                </li>
                                                            <li class="date31 ">
                                    <div class="qiandao-icon"></div>
                                </li>
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
<script type="text/javascript">
    $(function(){
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth()+1;
        var day = date.getDate();
        $(".current-date").text(year+"年"+month+"月"+day+"日");

        $(".zzp").click(function(){
            $(".htmleaf-container").fadeOut(500);
            $(".zzp").fadeOut(500);
        })
        $("#qiandao").click(function(){
            $(".htmleaf-container").fadeIn(500);
            $(".zzp").fadeIn(500);
        })
    })
</script>





</body>

<div style="display:none;">
<script type="text/javascript" src="/Home/js/19374418.js"></script>
</div>



<div style="display:none;">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b9bdbc783b993a3eece5a862a3ab6445";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>


<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?2bbf2912a175d7ef8ebc9926036abfab";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<div style="display:none;">
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261759893'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261759893%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
</div><script src="/Home/js/layer.js"></script>
<script src="/Home/js/jquery.lazyload.js"></script>
<script src="/Home/js/user_login.js"></script>
</html>