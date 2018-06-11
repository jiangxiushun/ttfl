<!doctype html>
<html lang="en">
<head>
<meta name="Generator" content=" " />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="我要天天福利" />
    <meta name="Description" content="我要天天福利" />
    <title>用户中心-签到</title>
    <link href="" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="/Home/css/reset.css">
    <link rel="stylesheet" href="/Home/css/register.css">
    <script src="/Home/js/jquery.js"></script>
    <script src="/Home/js/jquery.validate.js"></script>
</head>
<body>
<div class="header">
    <div class="logo">
        <a href="/"><img src="/Home/picture/logo.png"></a>
        <div class="hyzc">注册</div>
    </div>
    <div class="logo_right">
        <p>我已经注册，现在就<a href="/home/login">登陆 >></a></p>
    </div>
</div>
    <div class="mainbgzc">
    <div class="main">
        <div class="registration">
            <div class="registration_fl">
                <form action="/home/reg/store"  id="registerForm" method="post">
                    {{csrf_field()}}
                    <ul class="registration_ul">
                        <li>
                            <label>
                                <span class="red mr10">*</span>用户名：
                            </label>
                            <div class="login_input" >
                                <div class="text_div">
                                    <input name="username" class="text" type="text" id="username" placeholder="请输入用户名"/>
                                    <span id="prompt" style="padding-top:20px"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label>
                                <span class="red mr10">*</span>请设置密码：
                            </label>
                            <div class="login_input">
                                <div class="text_div">
                                    <input name="password" class="text"  type="password" id="password" maxlength="20" placeholder="请输入密码"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label>
                                <span class="red mr10">*</span>请确定密码：
                            </label>
                            <div class="login_input">
                                <div class="text_div">
                                    <input name="repassword" class="text" id="rePassword" maxlength="20" type="password" placeholder="请再次输入密码"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label>
                                <span class="red mr10">*</span>请输入邮箱：
                            </label>
                            <div class="login_input">
                                <div class="text_div">
                                    <input name="email" class="text" id="email"  type="text" placeholder="请输入邮箱"/>
                                    <span id="yemail" style="padding-top:20px"></span>
                                </div>
                            </div>
                        </li>
                        <li class="yzm">
                            <label>
                                <span class="red mr10">*</span>验证码：
                            </label>
                            <div class="text_div fl regi_inp_yz">
                                <input name="code" class="text captcha" id="captcha" type="text" placeholder="请输入验证码"/>
                    
                            </div>
                            <span class="">
                              <img src="/code" onclick="co_de(this)" title="点击切换验证码">
                            </span>
                            <script type="text/javascript">
                                function co_de(obj){
                                    obj.src = '/code?a='+Math.random();
                                }
                            </script>
                            <!-- <span class="kbq">看不清？>>点击图片更换验证码 </span> -->
                        </li>
                        <li class="yd">
                            <div class="login_input" style="width: 400px;">
                                <input checked="checked" onclick="return false;" style="margin-top: 9px;" name="agreement" id="agreecn" type="checkbox" value="1"
                                       class="agreement"/><label style="width: 260px">点击注册，表示您同意我要天天福利商城</label>
                                <label class="brown" style="width: 84px;"><a href="javascript:;"onclick="openStaticPopup()" style="color: #3754e3">《服务协议》</a>
                                </label>
                            </div>
                        </li>
                        <li class="tj">
                            <!--<label>&nbsp;</label>-->
                            <div class="" style="margin-left: 109px;margin-top: 10px;">
                                <input type="submit"  id="btnSubmit"  class="but" value='立即注册'>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div >
    </div>
</div>
<div class="footer">
    <div class="footer-content main">
        <div class="c-1 clearfix">
            <div class="item-1"><img src="picture/footer.png"></div>
            <div class="item-2">
                <div class="ewm-box"><img src="picture/gzh.jpg"></div>
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
<script type="text/javascript">
    $('#username').blur(function(){
        // 检测用户名
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var username = $('#username').val();
        $.get('/home/reg/username',{'username':username},function(msg){
                if(msg == 1){
                    $('#prompt').html('<font style="color:red;">用户名已存在</font>');
                }
                if(msg == 2){
                    $('#prompt').html('');
                }
            });
    });
</script>
</body>
</html>