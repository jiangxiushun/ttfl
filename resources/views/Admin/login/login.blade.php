<html>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>天天福利后台登录</title>
        <link href="/Home/images/small_top.png" rel="icon" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel="stylesheet" href="/Admin/assets/css/reset.css">
        <link rel="stylesheet" href="/Admin/assets/css/supersized.css">
        <link rel="stylesheet" href="/Admin/assets/css/style.css">
        <style type="text/css">
            .error{
                width:200px;
                height:20px;
            }
        </style>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>天天福利后台登录</h1>
                @if(session('error'))
                    <p>
                        {{session('error')}}
                    </p>   
                @endif
            <form action="/admin/login" method="post" <?php echo method_field('token'); ?>
                {{csrf_field()}}
                <input type="text" name="username" class="username" placeholder="请输入您的用户名！">
                <input type="password" name="password" class="password" placeholder="请输入您的用户密码！">
                <input type="text" class="Captcha" name="Captcha" placeholder="请输入验证码！">
                <img src="/code" style="padding-top:23px" onclick="code(this)" title="点击切换验证码">
                <button type="submit" class="submit_button">登录</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>
        <script type="text/javascript">
            function code(obj){
                obj.src = '/code?a='+Math.random();
            }
        </script>
        <!-- Javascript -->
        <script src="/Admin/assets/js/jquery-1.8.2.min.js" ></script>
        <script src="/Admin/assets/js/supersized.3.2.7.min.js" ></script>
        <script src="/Admin/assets/js/supersized-init.js" ></script>
        <script src="/Admin/assets/js/scripts.js" ></script>
    
    </body>
</html>

