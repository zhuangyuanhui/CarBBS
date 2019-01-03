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
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">
<!-- Required Stylesheets -->
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

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">
<script type="text/javascript" src="/admin/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js" ></script>
<link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">

<title> {{ $title or '爱车网' }} </title>

</head>

<body>
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
        @if (count($errors) > 0)
            <div class="alert alert-danger mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>{{ $title }}</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/login/checkemail" method="post">
                    {{ csrf_field() }}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="uname" class="mws-login-username required" placeholder="用户名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="email" id="email" class="mws-login-username required" placeholder="邮箱">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="email_code" style="width: 140px;" class="mws-login-password required" placeholder="邮箱验证码">
                            <a href="javascript:;"><span id="getEmailCode" class="btn btn-warning">获取邮箱验证码</span></a>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <input type="submit" value="提交" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var time = 5;
        var flag = true;
        jQuery('#getEmailCode').click(function(){
            var email = jQuery('#email').val();
            var email_preg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
            if(!email_preg.test(email)){
                return false;
            }
            jQuery(this).attr('disabled',true);
            if(flag){
                var timer = setInterval(function(){
                    if(time == 5 && flag){
                        jQuery('#getEmailCode').html('已发送');
                        flag = false;
                        var url = '/admin/login/sendemail/'+email;
                        $.get(url,{'email':email},function(data){
                        },'html');
                    } else if(time == 0){
                        jQuery('#getEmailCode').removeAttr('disabled');
                        jQuery('#getEmailCode').html('重新获取');
                        clearInterval(timer);
                        time = 5;
                        flag = true;
                    } else {
                        jQuery('#getEmailCode').html(time+'s ');
                        time--;
                    }
                },1000);
            }
            
        });
              
    </script>

</body>
</html>
