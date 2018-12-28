<!DOCTYPE html>
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">
<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">
<!-- 导入分页的css样式 -->
<link rel="stylesheet" type="text/css" href="/admin/css/pages_pages.css" >
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">
<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script type="text/javascript" src="/admin/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<!-- -----------------------------------------zhuangyuanhui ------------ 当前行数28  ----------------------------------------- -->
















<!-- -----------------------------------------zhangjianjun ---------------当前行数 45  -------------------------------------- -->



















<!-- -----------------------------------------shaomingshuo -------------------当前行数 65---------------------------------- -->
















<script type="text/javascript" src="/admin/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<title>{{ $title or 'Car BBS 后台管理'}}</title>
</head>
<body>
    <!-- Themer (Remove if not needed) -->  
    <div id="mws-themer">
        <div id="mws-themer-css-dialog">
            <form class="mws-form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->
    <!-- Header -->
    <div id="mws-header" class="clearfix">  
        <!-- Logo Container -->
        <div id="mws-logo-container">       
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/admin/images/mws-logo.png" alt="mws admin">
            </div>
        </div>        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
    
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        你好,管理员
                    </div>
                    <ul>
                        <li><a href="/admin/#">修改密码</a></li>
                        <li><a href="/admin/index.html">退出</a></li>
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
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- 左侧导航栏开始 -->
            <div id="mws-navigation">
                <ul>                                   
<!-- -----------------------------------------zhuangyuanhui -----------------------当前行数155------------------------------ -->












































<!-- -----------------------------------------zhangjianjun -----------------------------当前行数 200 ------------------------ -->
                    <li>
                        <a href="/admin/#"><i class="icon-th"></i>后台类别管理</a>
                        <ul>
                            <li><a href="/admin/cates/create">类别添加</a></li>
                            <li><a href="/admin/cates">类别列表</a></li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="/admin/#"><i class="icon-network"></i>友情链接管理</a>
                        <ul>
                            <li><a href="/admin/links/create">链接添加</a></li>
                            <li><a href="/admin/links">友情链接列表</a></li>
                        </ul>
                    </li>               
                    <li>
                        <a href="/admin/#"><i class="icon-list"></i>新闻管理</a>
                        <ul>
                            <li><a href="/admin/news/create">新闻添加</a></li>
                            <li><a href="/admin/news">新闻列表</a></li>
                        </ul>
                    </li>         
                    <li>
                        <a href="/admin/#"><i class="icon-monitor"></i>网站配置管理</a>
                        <ul>
                            <li><a href="/admin/basics/create">网站配置添加</a></li>
                            <li><a href="/admin/basics">网站配置列表</a></li>
                        </ul>
                    </li>      
                    <li>
                        <a href="/admin/#"><i class="icon-monitor"></i>文章举报管理</a>
                        <ul>
                            <li><a href="/admin/areports">文章举报列表</a></li>
                        </ul>
                    </li>






















<!-- -----------------------------------------shaomingshuo ----------------------------------当前行数257------------------- -->
                    <li>
                        <a href="/admin/#"><i class="icon-users"></i>后台用户管理</a>
                        <ul>
                            <li><a href="/admin/users/create">用户添加</a></li>
                            <li><a href="/admin/users">用户列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/#"><i class="icon-envelope"></i>前台广告位管理</a>
                        <ul>
                            <li><a href="/admin/adverts/create">广告位添加</a></li>
                            <li><a href="/admin/adverts">广告位列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/#"><i class="icon-play-circle"></i>前台轮播图管理</a>
                        <ul>
                            <li><a href="/admin/slides/create">轮播图添加</a></li>
                            <li><a href="/admin/slides">轮播图列表</a></li>
                        </ul>
                    </li>




























<!-- ****************************************************314************************************************ -->
                </ul>
            </div>
        </div>      
        <!-- 左侧导航栏结束 -->     
        <div id="mws-container" class="clearfix">
        <!-- 用户被重定向后，你可以从 session 中显示闪存消息 -->
        @if (session('error'))
            <div class="mws-form-message error">
                {{ session('error') }}
            </div>
        @endif        


        @if (session('success'))
            <div class="mws-form-message success">
                {{ session('success') }}
            </div>
        @endif
        <!-- 用户被重定向后，你可以从 session 中显示闪存消息 -->
        <!-- 内容体开始 -->  
        @section('content')

        @show
        <!-- 内容体结束 -->                
        <!-- 页尾底部开始 -->
        <div id="mws-footer">
                Copyright Your Website 2012. All Rights Reserved.
            </div>           
        </div>
        <!-- 页尾底部结束 -->
        
    </div>
    <!-- JavaScript Plugins -->
<!--     <script src="/admin/js/libs/jquery-1.8.3.min.js"></script> -->
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>
    <!-- Plugin Scripts -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>
    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>
    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admin/js/demo/demo.table.js"></script>
</body>
</html>
