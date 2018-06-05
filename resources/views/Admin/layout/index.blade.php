<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/Admin/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/plugins/fullcalendar/fullcalendar.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/plugins/fullcalendar/fullcalendar.print.css" media="print">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/yangshi.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fenye.css" media="screen">

<title>后台管理</title>
</head>

<body>
	<!-- Header -->
	<div id="mws-header" class="clearfix">
    	<!-- Logo Container -->
    	<div id="mws-logo-container">  
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/Admin/logo/logo.png" alt="mws admin">
			</div>
        </div>
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/Admin/example/1521029639923.jpeg" alt="User Photo">
                </div>
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                    Hello~:　@if(isset($_SESSION['user'])) {{session('user')->username}}
                    @endif
                        admin
                    </div>
                    <ul>
                        <li><a href="/admin/user/upwd/@if(isset($_SESSION['user'])){{session('user')->id}}
                    @endif">修改密码</a></li>
                    	<li><a href="/admin/login/out">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 后台用户管理</a>
                        <ul>
                            <li><a href="/admin/users">用户列表</a></li>
                            <li><a href="/admin/users/create">添加用户</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cates">分类列表</a></li>
                            <li><a href="/admin/cates/create">添加分类</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 商品管理</a>
                        <ul>
                            <li><a href="/admin/good">商品列表</a></li>
                            <li><a href="/admin/good/create">添加商品</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 轮播图管理</a>
                        <ul>
                            <li><a href="/admin/lunbos">轮播图列表</a></li>
                            <li><a href="/admin/lunbos/create">添加轮播图</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 友情链接管理</a>
                        <ul>
                            <li><a href="/admin/link">链接列表</a></li>
                            <li><a href="/admin/link/create">添加链接</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i>文章管理</a>
                        <ul>
                            <li><a href="/admin/articles">文章列表</a></li>
                            <li><a href="/admin/articles/create">添加文章</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
            <!-- 内容开始 -->
            <div class="container">
            @section('index')

            @show
            </div>
        	<!-- 内容开始 -->
            <div class="container">
            
            <!-- 提示失败信息 -->
            @if(session('error'))
            <div class="mws-form-message error">
                {{ session('error') }}
            </div>
                
            @endif

            @if(session('success'))
            <div class="mws-form-message success">
                {{ session('success') }}
            </div>
            @endif

            @section('content')
            @show
            </div>
                <!-- 内容结束 -->
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/Admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Admin/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="/Admin/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/Admin/js/demo/demo.calendar.js"></script>

</body>
</html>
