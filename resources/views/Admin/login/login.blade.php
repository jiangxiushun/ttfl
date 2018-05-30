

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <title>登录界面</title>
    <link href="/Admin/css/login/default.css" rel="stylesheet" type="text/css" />
    <!--必要样式-->
    <link href="/Admin/css/login/styles.css" rel="stylesheet" type="text/css" />
    <link href="/Admin/css/login/demo.css" rel="stylesheet" type="text/css" />
    <link href="/Admin/css/login/loaders.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class='login'>
      <div class='login_title'>
        <span>管理员登录</span>
      </div>
      <div class='login_fields'>
      <form action="/admin/login" method="post">
        {{ csrf_field() }}
        <div class='login_fields__user'>
          <div class='icon'>
            <img alt="" src='/Admin/img/user_icon_copy.png'>
          </div>
          <input name="username" placeholder='用户名' maxlength="16" type='text' autocomplete="off" value=""/>
            <div class='validation'>
              <img alt="" src='/Admin/img/tick.png'>
            </div>
        </div>
        <div class='login_fields__password'>
          <div class='icon'>
            <img alt="" src='/Admin/img/lock_icon_copy.png'>
          </div>
          <input name="password" placeholder='密码' maxlength="16" type='password' autocomplete="off">
          <div class='validation'>
            <img alt="" src='/Admin/img/tick.png'>
          </div>
        </div>
        <div class='login_fields__password'>
          <div class='icon'>
            <img alt="" src='/Admin/img/key.png'>
          </div>
          <input name="code" placeholder='验证码' maxlength="4" type='text' name="ValidateNum" autocomplete="off">
          <div class='validation' style="opacity: 1; right: -5px;top: -3px;">
          <canvas class="J_codeimg" id="myCanvas" onclick="Code();">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
          </div>
        </div>
        <div class='login_fields__submit'>
          <input type='submit' value='登录'>
        </div>
        </form>
      </div>
      <div class='success'>
      </div>
      <div class='disclaimer'>
        <p>　　　　　欢迎登录后台管理系统</p>
      </div>
    </div>
    <div class='authent'>
      <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
        <div class="loader-inner ball-clip-rotate-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
        </div>
      <p>认证中...</p>
    </div>
    <div class="OverWindows"></div>
    
    <link href="/Admin/layui/css/layui.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="/Admin/js/login/jquery.min.js"></script>
    <script type="text/javascript" src="/Admin/js/login/jquery-ui.min.js"></script>
    <script type="text/javascript" src='/Admin/js/login/stopExecutionOnTimeout.js?t=1'></script>
    <script type="text/javascript" src="/Admin/layui/layui.js"></script>
    <script type="text/javascript" src="/Admin/js/login/Particleground.js"></script>
    <script type="text/javascript" src="/Admin/js/login/Treatment.js"></script>
    <script type="text/javascript" src="/Admin/js/login/jquery.mockjax.js"></script>
    <script type="text/javascript">
        var canGetCookie = 0;//是否支持存储Cookie 0 不支持 1 支持
        var ajaxmockjax = 1;//是否启用虚拟Ajax的请求响 0 不启用  1 启用
        //默认账号密码
        var CodeVal = 0;
        Code();
        function Code() {
            if(canGetCookie == 1){
                showCheck(AdminCode);
            }else{
                showCheck(createCode(""));
            }
        }
        function showCheck(a) {
            CodeVal = a;
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            ctx.clearRect(0, 0, 1000, 1000);
            ctx.font = "80px 'Hiragino Sans GB'";
            ctx.fillStyle = "#E8DFE8";
            ctx.fillText(a, 0, 100);
        }
        //粒子背景特效
        $('body').particleground({
            dotColor: '#E8DFE8',
            lineColor: '#133b88'
        });
        $('input[name="pwd"]').focus(function () {
            $(this).attr('type', 'password');
        });
        $('input[type="text"]').focus(function () {
            $(this).prev().animate({ 'opacity': '1' }, 200);
        });
        $('input[type="text"],input[type="password"]').blur(function () {
            $(this).prev().animate({ 'opacity': '.5' }, 200);
        });
      
    </script>

</body>
</html>
