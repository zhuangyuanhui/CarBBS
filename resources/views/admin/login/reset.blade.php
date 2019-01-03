<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

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
    <div style="width: 200px;height: 200px;background: red0"></div>
    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>{{ $title }}</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/login/changepwd" method="post">
                    {{ csrf_field() }}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="upwd" class="mws-login-password required" placeholder="新密码">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="reupwd" class="mws-login-password required" placeholder="验证密码">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <input type="submit" value="修改密码" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
