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
            <form action="/home/login/dologin" method="post" novalidate="novalidate">
                {{csrf_field()}}
                <div class="forms">
                    <div class="oth_logins">
                        <h2><span class="lie"></span><span class="zc">免注册，一键登录</span></h2>
                        <div class="login_icons">
                            <a class="lg_qq" href="#"></a>
                            <a href="#" class="lg_sina"></a>
                            <a href="#" class="lg_wx"></a>
                        </div>
                    </div>
                    @if(session('error'))  
                        {{session('error')}}
                    @endif
                    <h1><a href="/home/reg" class="gotoRegister">立即免费注册 <i></i></a>登录天天福利</h1>
                    <div class="fo_inp">
                        <span></span>
                        <input type="text" id="username" name="username" class="name valid" value="" maxlength="200" placeholder="请输入账户名" aria-required="true" aria-invalid="false" value="{{old('username')}}">
                    </div>
                    <div class="fo_inp">
                        <span class="ps_ico"></span>
                        <input type="password" id="password" name="password" class="pas valid" value="" placeholder="请输入密码" maxlength="200" autocomplete="off" aria-required="true" aria-invalid="false">
                    </div>
                    <div id="div_captcha" class="fo_inp fo_inp3 ">
                        <input type="text" id="captcha" name="Captcha" class="captcha"  placeholder="请输入验证码">
                        <img class="captchaImage"  onclick="rcode(this)" title="点击更换验证码" src="/code">
                    </div>
                    <script type="text/javascript">
                        function rcode(obj){
                            obj.src = '/code?a='+Math.random();
                        }
                    </script>
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
</html>