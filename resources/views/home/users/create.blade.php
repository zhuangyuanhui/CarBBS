<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
    
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            立即注册 - 玩车达人
        </title>
        <meta name="keywords" content="" />
        <meta name="description" content=",玩车达人" />
        <meta name="generator" content="Discuz! X3.2" />
        <meta name="author" content="Discuz! Team and Comsenz UI Team" />
        <meta name="copyright" content="2001-2013 Comsenz Inc." />
        <meta name="MSSmartTagsPreventParsing" content="True" />
        <meta http-equiv="MSThemeCompatible" content="Yes" />
        <link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css"/>      
        <!-- <script src="/home/js/jquery.min.js" type="text/javascript"></script> -->
        <script src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <meta name="application-name" content="玩车达人" />
        <meta name="msapplication-tooltip" content="玩车达人" />
        <meta name="msapplication-task" content="name=首页;action-uri=http://quaters.cn/display/che/portal.php;icon-uri=http://quaters.cn/display/che/static/image/common/portal.ico"
        />
        <meta name="msapplication-task" content="name=论坛;action-uri=http://quaters.cn/display/che/forum.php;icon-uri=http://quaters.cn/display/che/static/image/common/bbs.ico"
        />
        <meta name="msapplication-task" content="name=群组;action-uri=http://quaters.cn/display/che/group.php;icon-uri=http://quaters.cn/display/che/static/image/common/group.ico"
        />
        <meta name="msapplication-task" content="name=动态;action-uri=http://quaters.cn/display/che/home.php;icon-uri=http://quaters.cn/display/che/static/image/common/home.ico"
        />
        <link rel="stylesheet" id="css_widthauto" type="text/css" href="/home/css/style_6_widthauto.css"
        />

    </head>
    
    <body id="nv_member" class="pg_register" onkeydown="if(event.keyCode==27) return false;">
        <div id="append_parent">
        </div>
        <div id="ajaxwaitid">
        </div>
        <div id="Quater_headtop">
            <div class="wp cl">
            </div>
            <div id="Quater_bar" class="cl">
                <div class="wp cl">
                    <!-- 站点LOGO -->
                    <div class="hd_logo">
                        <h2>
                            <a href="portal.php">
                                <img src="/home/picture/logo.png" />
                            </a>
                        </h2>
                    </div>
                    <!-- 导航 -->
                    <div class="nav">
                        <ul>
                            <li id="mn_portal">
                                <a href="portal.php" hidefocus="true" title="Portal">
                                    首页
                                    <span>
                                        Portal
                                    </span>
                                </a>
                            </li>
                            <li id="mn_P1" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'hover','duration':2})">
                                <a href="http://quaters.cn/display/che/portal.php?mod=list&catid=1" hidefocus="true">
                                    新闻
                                </a>
                            </li>
                            <li id="mn_P4">
                                <a href="http://quaters.cn/display/che/portal.php?mod=list&catid=4" hidefocus="true">
                                    车模
                                </a>
                            </li>
                            <li id="mn_forum_2">
                                <a href="forum.php" hidefocus="true" title="BBS">
                                    论坛
                                    <span>
                                        BBS
                                    </span>
                                </a>
                            </li>
                            <li id="mn_N708e" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'hover','duration':2})">
                                <a href="javascript:void(0);" hidefocus="true">
                                    优化
                                </a>
                            </li>
                            <li id="mn_P5">
                                <a href="http://quaters.cn/display/che/wei/" hidefocus="true">
                                    微官网
                                </a>
                            </li>
                            <li id="mn_P6">
                                <a href="http://quaters.cn/display/che/about/" hidefocus="true">
                                    关于
                                </a>
                            </li>
                            <li id="mn_N9175">
                                <a href="http://addon.discuz.com/?@quater_6_che.template.72473" hidefocus="true"
                                target="_blank">
                                    购买
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- 用户信息 -->
                    <div class="Quater_user lg_box" style="width: 92px; margin-left: 20px;">
                        <ul>
                            <li class="z" style="margin-right: 0;">
                                <a href="member.php?mod=logging&amp;action=login" class="log1">
                                    <i>
                                    </i>
                                    登录 /
                                </a>
                            </li>
                            <li class="z">
                                <a href="member.php?mod=register" class="reg1">
                                    <i>
                                    </i>
                                    注册
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div style="display:none">
                        <form method="post" autocomplete="off" id="lsform" action="/home/users"
                        onsubmit="return lsSubmit();">
                        {{ csrf_field() }}
                            <div class="fastlg cl">
                                <span id="return_ls" style="display:none">
                                </span>
                                <div class="y pns">
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <span class="ftid">
                                                    <select name="fastloginfield" id="ls_fastloginfield" width="40" tabindex="900">
                                                        <option value="username">
                                                            用户名
                                                        </option>
                                                        <option value="email">
                                                            Email
                                                        </option>
                                                    </select>
                                                </span>
                                            </td>
                                            <td>
                                                <input type="text" name="username" id="ls_username" autocomplete="off"
                                                class="px vm" tabindex="901" />
                                            </td>
                                            <td class="fastlg_l">
                                                <label for="ls_cookietime">
                                                    <input type="checkbox" name="cookietime" id="ls_cookietime" class="pc"
                                                    value="2592000" tabindex="903" />
                                                    自动登录
                                                </label>
                                            </td>
                                            <td>
                                                &nbsp;
                                                <a href="javascript:;" onclick="showWindow('login', 'member.php?mod=logging&action=login&viewlostpw=1')">
                                                    找回密码
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="ls_password" class="z psw_w">
                                                    密码
                                                </label>
                                            </td>
                                            <td>
                                                <input type="password" name="password" id="ls_password" class="px vm"
                                                autocomplete="off" tabindex="902" />
                                            </td>
                                            <td class="fastlg_l">
                                                <button type="submit" class="pn vm" tabindex="904" style="width: 75px;">
                                                    <em>
                                                        登录
                                                    </em>
                                                </button>
                                            </td>
                                            <td>
                                                &nbsp;
                                                <a href="member.php?mod=register" class="xi2 xw1">
                                                    立即注册
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="hidden" name="quickforward" value="yes" />
                                    <input type="hidden" name="handlekey" value="ls" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div href="javascript:void(0)" target="_blank" class="search-li" title="搜索">
                        <i class="icon-search ">
                        </i>
                        <span>
                            搜索
                        </span>
                    </div>
                    <div style="display: none;" class="quater_search">
                        <div class="wp cl" style="width: 570px; margin: 0 auto; position: relative; z-index: 1000; background: none;">
                            <div id="scbar" class="cl">
                                <form id="scbar_form" method="post" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))"
                                action="search.php?searchsubmit=yes" target="_blank">
                                    <input type="hidden" name="mod" id="scbar_mod" value="search" />
                                    <input type="hidden" name="formhash" value="7bb95f5a" />
                                    <input type="hidden" name="srchtype" value="title" />
                                    <input type="hidden" name="srhfid" value="0" />
                                    <input type="hidden" name="srhlocality" value="member::register" />
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="scbar_btn_td">
                                                <button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc"
                                                value="true">
                                                    <strong class="xi2">
                                                        搜索
                                                    </strong>
                                                </button>
                                            </td>
                                            <td class="scbar_type_td">
                                                <a href="javascript:;" id="scbar_type" class="xg1" onclick="showMenu(this.id)"
                                                hidefocus="true">
                                                    搜索
                                                </a>
                                            </td>
                                            <td class="scbar_txt_td">
                                                <input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off"
                                                x-webkit-speech speech />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="scbar_hot_td" style="float: left; width: 570px; padding: 35px 0;">
                                <div id="scbar_hot" style="height: auto; padding: 0;">
                                    <div class="hot_1 cl" style="font-size: 16px; margin: 0 0 12px 0; color: #BBBBBB; font-weight: 400;">
                                        热搜
                                    </div>
                                    <div class="hot_2 cl">
                                    </div>
                                    <a href="search.php?mod=forum&amp;srchtxt=%BB%EE%B6%AF&amp;formhash=7bb95f5a&amp;searchsubmit=true&amp;source=hotsearch"
                                    target="_blank" class="xi2" sc="1" style=" display: inline-block;
                                    color: #4ecdc4;
                                    font-weight: 700;
                                    font-size: 16px;
                                    float: left;
                                    height: 33px;
                                    border: 1px solid #f0f0f0;
                                    margin: 0 20px 20px 0;
                                    padding: 0 15px;
                                    cursor: pointer;
                                    line-height: 33px;">
                                        活动
                                    </a>
                                    <a href="search.php?mod=forum&amp;srchtxt=%BD%BB%D3%D1&amp;formhash=7bb95f5a&amp;searchsubmit=true&amp;source=hotsearch"
                                    target="_blank" class="xi2" sc="1" style=" display: inline-block;
                                    color: #4ecdc4;
                                    font-weight: 700;
                                    font-size: 16px;
                                    float: left;
                                    height: 33px;
                                    border: 1px solid #f0f0f0;
                                    margin: 0 20px 20px 0;
                                    padding: 0 15px;
                                    cursor: pointer;
                                    line-height: 33px;">
                                        交友
                                    </a>
                                    <a href="search.php?mod=forum&amp;srchtxt=discuz&amp;formhash=7bb95f5a&amp;searchsubmit=true&amp;source=hotsearch"
                                    target="_blank" class="xi2" sc="1" style=" display: inline-block;
                                    color: #4ecdc4;
                                    font-weight: 700;
                                    font-size: 16px;
                                    float: left;
                                    height: 33px;
                                    border: 1px solid #f0f0f0;
                                    margin: 0 20px 20px 0;
                                    padding: 0 15px;
                                    cursor: pointer;
                                    line-height: 33px;">
                                        discuz
                                    </a>
                                </div>
                            </div>
                            <ul id="scbar_type_menu" class="p_pop" style="display: none;">
                                <li>
                                    <a href="javascript:;" rel="article">
                                        文章
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" rel="forum" class="curtype">
                                        帖子
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" rel="group">
                                        群组
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" rel="user">
                                        用户
                                    </a>
                                </li>
                            </ul>

                            <!-- 搜索筛选 -->
                            <ul id="scbar_type_menu" class="p_pop" style="display: none;">
                                <li>
                                    <a href="javascript:;" rel="article">
                                        文章
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" rel="forum" class="curtype">
                                        帖子
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" rel="group">
                                        群组
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" rel="user">
                                        用户
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <i class="close-search headericon-close">
                        </i>
                    </div>
                    <div class="global-search-mask" style="display: none; background-color: #FFFFFF; width: 100%; height: 100%; position: fixed; top: 0; left: 0px; z-index: 300;">
                    </div>
                </div>
            </div>
        </div>
        <div class="mus_box cl">
            <div id="mus" class="wp cl">
            </div>
        </div>
        <div id="qmenu_menu" class="p_pop blk" style="display: none;">
            <div class="ptm pbw hm">
                请
                <a href="javascript:;" class="xi2" onclick="lsSubmit()">
                    <strong>
                        登录
                    </strong>
                </a>
                后使用快捷导航
                <br />
                没有帐号？
                <a href="member.php?mod=register" class="xi2 xw1">
                    立即注册
                </a>
            </div>
            <div id="fjump_menu" class="btda">
            </div>
        </div>
        <ul class="p_pop h_pop" id="plugin_menu" style="display: none">
            <li>
                <a href="dsu_paulsign-sign.html" id="mn_plink_sign">
                    每日签到
                </a>
            </li>
        </ul>
        <!-- 二级导航 -->
        <div class="sub_nav">
            <ul class="p_pop h_pop" id="mn_P1_menu" style="display: none">
                <li>
                    <a href="http://quaters.cn/display/che/portal.php?mod=list&catid=3" hidefocus="true">
                        二手车
                    </a>
                </li>
                <li>
                    <a href="http://quaters.cn/display/che/portal.php?mod=list&catid=2" hidefocus="true">
                        SUV
                    </a>
                </li>
                <li>
                    <a href="http://quaters.cn/display/che/portal.php?mod=list&catid=8" hidefocus="true">
                        改装
                    </a>
                </li>
                <li>
                    <a href="http://quaters.cn/display/che/portal.php?mod=list&catid=7" hidefocus="true">
                        汽车横评
                    </a>
                </li>
            </ul>
            <div class="p_pop h_pop" id="mn_userapp_menu" style="display: none">
            </div>
            <ul class="p_pop h_pop" id="mn_N708e_menu" style="display: none">
                <li>
                    <a href="brands" hidefocus="true">
                        品牌页
                    </a>
                </li>
                <li>
                    <a href="group.php" hidefocus="true">
                        群组页
                    </a>
                </li>
                <li>
                    <a href="thread-21-1-1.html" hidefocus="true">
                        活动页
                    </a>
                </li>
                <li>
                    <a href="forum.php?mod=guide&view=newthread" hidefocus="true">
                        导读页
                    </a>
                </li>
                <li>
                    <a href="thread-20-1-1.html" hidefocus="true">
                        帖子页
                    </a>
                </li>
                <li>
                    <a href="home.php?mod=space&uid=6&do=profile" hidefocus="true">
                        个人空间
                    </a>
                </li>
                <li>
                    <a href="misc.php?mod=ranklist" hidefocus="true">
                        排行榜单
                    </a>
                </li>
                <li>
                    <a href="member.php?mod=logging&action=login" hidefocus="true">
                        登陆页面
                    </a>
                </li>
            </ul>
        </div>
        <!-- 用户菜单 -->
        <ul class="sub_menu" id="m_menu" style="display: none;">
            <li style="display: none;">
                <a href="home.php?mod=magic" style="background-image:url(images/magic_b.png) !important">
                    道具
                </a>
            </li>
            <li style="display: none;">
                <a href="home.php?mod=medal" style="background-image:url(images/medal_b.png) !important">
                    勋章
                </a>
            </li>
            <li style="display: none;">
                <a href="home.php?mod=task" style="background-image:url(images/task_b.png) !important">
                    任务
                </a>
            </li>
            <li>
                <a href="home.php?mod=spacecp">
                    设置
                </a>
            </li>
            <li>
                <a href="home.php?mod=space&amp;do=favorite&amp;view=me">
                    我的收藏
                </a>
            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
                <a href="member.php?mod=logging&amp;action=logout&amp;formhash=7bb95f5a">
                    退出
                </a>
            </li>
        </ul>
        <ul class="sub_menu" id="l_menu" style="display: none;">
            <!-- 第三方登录 -->
            <li class="user_list app_login">
                <a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login">
                    <i class="i_qq">
                    </i>
                    腾讯QQ
                </a>
            </li>
            <li class="user_list app_login">
                <a href="wechat-login.html">
                    <i class="i_wb">
                    </i>
                    微信登录
                </a>
            </li>
        </ul>
        <div id="wp" class="wp time_wp cl">
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <link rel="stylesheet" type="text/css" href="/home/css/member.css" />
            <div id="background" class="background">
                <div class="filter">
                </div>
            </div>
            <div style="width: 1000px; margin: 0 auto;">
                <div id="ct" class="wp cl" style="padding: 100px 0 60px 0;">
                    <div class="nfl" id="main_succeed" style="display: none">
                        <div class="f_c altw">
                            <div class="alert_right">
                                <p id="succeedmessage">
                                </p>
                                <p id="succeedlocation" class="alert_btnleft">
                                </p>
                                <p class="alert_btnleft">
                                    <a id="succeedmessage_href">
                                        如果您的浏览器没有自动跳转，请点击此链接
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mn">
                        <div class="comForm cl" id="main_message" style="border: 0;">
                            <div class="bm_h" id="main_hnav" style="padding-left: 20px; height: 50px; line-height: 50px; border-bottom: 0; background: none;">
                                <h3 id="layer_reginfo_t" style="height: 50px; line-height: 50px; padding-top: 10px; font-size: 24px; font-weight: bold; color: #CCCCCC;">
                                    立即注册
                                </h3>
                            </div>
                            <p id="returnmessage4">
                            </p>
                            <form method="post" autocomplete="off" name="register" 
                            enctype="multipart/form-data" return false;" action="/home/users">
                            {{ csrf_field() }}
                                <div class="bm_c">
                                    <input type="hidden" name="regsubmit" value="yes" />
                                    <input type="hidden" name="formhash" value="7bb95f5a" />
                                    <input type="hidden" name="referer" value="http://quaters.cn/display/che/./"
                                    />
                                    <input type="hidden" name="activationauth" value="" />
                                    <div class="mtw">
                                        <div id="zzz">
                                            <div class="rfm">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <span class="rq">
                                                                *
                                                            </span>
                                                            <label for="m7e876">
                                                                用户名:
                                                            </label>
                                                        </th>
                                                        <td>
                                                            <input type="text" id="users_name" name="uname" class="px preg" tabindex="1" value="{{old('uname')}}"
                                                            autocomplete="off" size="25" maxlength="15" required />
                                                        </td>
                                                        <td class="tipcol">
                                                            <i id="users_content" class="p_tip" style="display: none" >
                                                                用户名由 5 到 15 个字符组成
                                                            </i>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="rfm">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <span class="rq">
                                                                *
                                                            </span>
                                                            <label for="h7b79Y">
                                                                密码:
                                                            </label>
                                                        </th>
                                                        <td>
                                                            <input type="text" id="upwd_name" name="upwd" size="25" tabindex="1" class="px preg"
                                                            required />
                                                        </td>
                                                        <td class="tipcol">
                                                            <i id="upwd_content" class="p_tip" style="display: none">
                                                                请填写密码, 最小长度为 6 个字符
                                                            </i>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="rfm">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <span class="rq">
                                                                *
                                                            </span>
                                                            <label for="UCi73k">
                                                                确认密码:
                                                            </label>
                                                        </th>
                                                        <td>
                                                            <input type="password" id="reupwd_name" name="reupwd" size="25" tabindex="1" value=""
                                                            class="px preg" required />
                                                        </td>
                                                        <td class="tipcol">
                                                            <i id="reupwd_content" class="p_tip" style="display: none">
                                                                请再次输入密码
                                                            </i>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="rfm">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <span class="rq">
                                                                *
                                                            </span>
                                                            <label for="Z61Aw6">
                                                                手机:
                                                            </label>
                                                        </th>
                                                        <td>
                                                            <input type="text" id="tel_name" name="tel" autocomplete="off" size="25" tabindex="1"
                                                            class="px preg" value="{{old('tel')}}" required />
                                                            <br />
                                                            <em id="emailmore">
                                                                &nbsp;
                                                            </em>
                                                        </td>
                                                        <td class="tipcol">
                                                            <i id="reupwd_content" class="p_tip" style="display: none">
                                                                请输入正确的手机号
                                                            </i>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="rfm">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <span class="rq">
                                                                
                                                            </span>
                                                            <label for="Z61Aw6">
                                                                验证码:
                                                            </label>
                                                        </th>
                                                        <td>
                                                            <input type="text" id="tel_code" name="tel_code" autocomplete="off" size="25" tabindex="1"
                                                            class="px" value="{{old('tel_code')}}" required />
                                                            <br />
                                                            <em id="emailmore">
                                                                &nbsp;
                                                            </em>
                                                        </td>
                                                        <td>
                                                            <div style="height:32px;width:95px"  class="btn btn-success">
                                                                <a href="javascript:;" id="tel_disblade" ><span id="dyMobileButton"> 获取验证码 </span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <span id="seccode_cSeL39bp" class="seccode_1">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="layer_reginfo_b">
                                    <div class="rfm mbw bw0">
                                        <table width="100%">
                                            <tr>
                                                <th>
                                                    &nbsp;
                                                </th>
                                                <td>
                                                    <div id="reginfo_a_btn" class="login_btn">
                                                        <em>
                                                            &nbsp;
                                                        </em>
                                                        <button class="pn pnc" id="registerformsubmit" type="submit" name="regsubmit"
                                                        value="true" tabindex="1">
                                                            注册
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="login_now cl" style="padding-left: 446px;">
                                    <a href="#"
                                    onclick="showWindow('login', this.href);return false;" class="xi2">
                                        <em style="color: #000000;">
                                            已有账号？
                                        </em>
                                        现在登录
                                    </a>
                                </div>
                            </form>
                        </div>

                        <script type="text/javascript">
                            var time = 5;
                            var flag = true;   //设置点击标记，防止5内再次点击生效
                         
                            //发送验证码
                                $('#dyMobileButton').click(function(){
                                    $(this).attr("disabled",true);
                                    if(flag){
                                        var timer = setInterval(function () {
                                            if(time == 5 && flag){
                                                flag = false;
                                                var tel_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                                                 var tel = $('#tel_name').val();
                                                   if(!tel_preg.test(tel)){
                                                    return false;
                                                   }
                                                    var url = '/home/users/send/'+tel;
                                                $.get(url,{'tel':tel},function(data){
                                                    //接受短信发送结果
                                                    if(data.code == 2){
                                                        $("#dyMobileButton").html("已发送");
                                                    }else{
                                                        flag = true;
                                                        time = 5;
                                                        clearInterval(timer);
                                                    }
                                               },'json');
                                            }else if(time == 0){
                                                $("#dyMobileButton").removeAttr("disabled");
                                                $("#dyMobileButton").html("免费获取验证码");
                                                clearInterval(timer);
                                                time = 5;
                                                flag = true;
                                            }else {
                                                $("#dyMobileButton").html(time + " s 重新发送");
                                                time--;
                                            }
                                 },1000);
                              }

                            //   $('#tel_code').blur(function(){
                            //     //拿到验证码
                            //         var tel_code = $('#tel_code').val();
                            //         var url = '/home/users/checkcode/' + tel_code;
                            //         $.get(url,{'tel_code':tel_code},function(data){
                            //             console.log(data.code);
                            //             // $("#dyMobileButton").html('验证码错误');
                            //              if(data.code == 'error'){
                            //                  $("#dyMobileButton").html('验证码错误');
                            //                   isTel = false;
                            //              }else{
                            //                 $("#dyMobileButton").html('验证码正确ww');
                            //                isTel = false;
                            //              }
                            //         },'json');

                            // });
                        }); 

                    </script>
                        <script type="text/javascript">
                            $(function(){   
                            //标识符                             
                               var isUname,isUpwd,isReupwd,isPhone,isTel = false;

                                //绑定聚焦事件
                                $('.preg').focus(function(){
                                    $(this).parent().next().children([0]).css('display','block');
                                });

                                //绑定失焦事件
                               $('#users_name').blur(function(){
                                    var uname_preg = /^[a-zA-Z]{1}[\w]{4,15}$/;
                                    var uname_val = $('#users_name').val();
                                   //正则判断用户名
                                    if(uname_preg.test(uname_val)){
                                        var url = "/home/users/checkname/" + uname_val;
                                        //发送ajax检测账号是否存在
                                        $.get(url,{'uname':uname_val},function(data){
                                            if(data.code == 'success'){
                                                 isUname = true;
                                                $('#users_name').parent().next().children([0]).html('恭喜用户名可用');
                                                $('#users_name').parent().next().children([0]).css('color','green');
                                            }else{
                                                $('#users_name').parent().next().children([0]).html('用户名已存在');
                                                $('#users_name').parent().next().children([0]).css('color','red');
                                            }
                                        },'json');
                                    }else{
                                        isUname = false;
                                        $(this).parent().next().children([0]).html('用户名格式不正确');
                                        $(this).parent().next().children([0]).css('color','red');
                                    }
                               });

                               $('#upwd_name').blur(function(){
                                    var upwd_preg = /^[a-zA-Z]{1}/;
                                    var upwd_val = $('#upwd_name').val();
                                  

                                    if( upwd_val.length < 5 ){
                                        $(this).parent().next().children([0]).html('密码长度不得少于6位');
                                        $(this).parent().next().children([0]).css('color','red');
                                    }else if(upwd_preg.test(upwd_val)){

                                        //声明数组当作标识符
                                        var arr = [];
                                        // 检测数字
                                        var number_preg = /[0-9]+/g;
                                        if(number_preg.test(upwd_val)){
                                            arr.push('数字');
                                        }

                                        // 检测小写字母
                                        var small_str_preg = /[a-z]+/g;
                                        if(small_str_preg.test(upwd_val)){
                                            arr.push('小写字母');
                                        }
                                        // 检测大写字母
                                        var big_str_preg = /[A-Z]+/g;
                                        if(big_str_preg.test(upwd_val)){
                                            arr.push('大写字母');
                                        }
                                        // 特殊符号
                                        var t_str_preg = /[^0-9a-zA-Z]+/g;
                                        if(t_str_preg.test(upwd_val)){
                                            arr.push('特殊符号');
                                        }
                                        console.log(arr);
                                        // 处理密码结果
                                        switch(arr.length){
                                            case 1:
                                            $(this).parent().next().children([0]).html('密码为弱');
                                                break;
                                            case 2:
                                            $(this).parent().next().children([0]).html('密码为中');
                                                break;
                                            case 3:
                                            $(this).parent().next().children([0]).html('密码为强');
                                                break;
                                            case 4:
                                            $(this).parent().next().children([0]).html('密码为超强');
                                                break;
                                        }
                                    }else{
                                        $(this).parent().next().children([0]).html('密码格式不正确');
                                        $(this).parent().next().children([0]).css('color','red');

                                    }                                  
                               });

                           //确认密码框绑定失焦事件
                            $('#reupwd_name').blur(function(){
                                 var reupwd_val = $('#reupwd_name').val();
                                 var upwd_val = $('#upwd_name').val();
                                if( upwd_val == reupwd_val){
                                    isReupwd = true;
                                    $(this).parent().next().children([0]).html('恭喜密码一致');
                                    $(this).parent().next().children([0]).css('color','green');
                                }else{
                                    isReupwd = false;
                                     $(this).parent().next().children([0]).html('两次密码不一致');
                                      $(this).parent().next().children([0]).css('color','red');
                                }
                            });


                            //手机框绑定失焦事件
                            $('#tel_name').blur(function(){
                                 var tel_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                                var tel_val = $('#tel_name').val();
                                if(tel_preg.test(tel_val)){
                                    isPhone = true;
                                    $(this).parent().next().children([0]).html('手机号格式正确');
                                    $(this).parent().next().children([0]).css('color','green');
                                }else{
                                    isPhone = false;
                                    $(this).parent().next().children([0]).html('手机号格式不正确');
                                     $(this).parent().next().children([0]).css('color','red');
                                }
                            });

                            
                            //注册按钮点击事件,当用户名,手机,密码都正确才能发送提交
                            $('#registerformsubmit').click(function(){
                                if(isUname&&isPhone&&isReupwd&&isTel){
                                    return true;
                                }else{
                                    return false;
                                }
                            });

                        });
                        </script>
                        <div id="layer_regmessage" class="f_c blr nfl" style="display: none">
                            <div class="c">
                                <div class="alert_right">
                                    <div id="messageleft1">
                                    </div>
                                    <p class="alert_btnleft" id="messageright1">
                                    </p>
                                </div>
                            </div>
                            <div id="layer_bbrule" style="display: none">
                                <div class="c" style="width:700px;height:350px;overflow:auto">
                                    <br />
                                    <br />
                                    <br />
                                </div>
                                <p class="fsb pns cl hm">
                                    <button class="pn pnc" onclick="$('agreebbrule').checked = true;hideMenu('fwin_dialog', 'dialog');">
                                        <span>
                                            同意
                                        </span>
                                    </button>
                                    <button class="pn" onclick="location.href='http://quaters.cn/display/che/'">
                                        <span>
                                            不同意
                                        </span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer" class="footer cl">
            <div class="footer_top cl">
                <div class="wp main">
                    <div class="part">
                        <div class="smtitle">
                            购车帮助
                        </div>
                        <div class="sm">
                            <a class="" href="#">
                                <p>
                                    购车流程
                                </p>
                            </a>
                            <a class="" href="#">
                                <p>
                                    商务合作
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="part">
                        <div class="smtitle">
                            联系我们
                        </div>
                        <div class="sm">
                            <a class="" href="#">
                                <p>
                                    关注我们
                                </p>
                            </a>
                            <a class="" href="#">
                                <p>
                                    意见反馈
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="part">
                        <div class="smtitle">
                            关注我们
                        </div>
                        <div class="sm">
                            <a class="" href="#">
                                <p>
                                    关于我们
                                </p>
                            </a>
                            <a class="" href="#">
                                <p>
                                    媒体报道
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="part">
                        <div class="smtitle">
                            加入我们
                        </div>
                        <div class="sm">
                            <a class="" href="#">
                                <p>
                                    招聘专页
                                </p>
                            </a>
                            <a class="" href="#">
                                <p>
                                    职位一览
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="scan">
                        <img src="/home/picture/w1.png" class="loaded" width="100" />
                        <p>
                            扫码查看手机版
                        </p>
                    </div>
                    <div class="scan">
                        <img src="/home/picture/w2.png" class="loaded" width="100" />
                        <p>
                            手机版演示站
                        </p>
                    </div>
                </div>
            </div>
            <div id="ft" class="wp cl">
                <div class="footer-left cl">
                    &copy; 2001-2018
                    <a href="#" target="_blank">
                        Comsenz Inc.
                    </a>
                    Powered by
                    <a href="#" target="_blank">
                        Discuz!
                    </a>
                    /
                    <a href="http://www.miitbeian.gov.cn/" target="_blank">
                        粤ICP201500801号-1
                    </a>
                </div>
            </div>
            <div id="share">
                <a class="moquu_wxin">
                    <div class="moquu_wxinh">
                        <em class="arrow">
                        </em>
                    </div>
                </a>
                <a id="totop" title="">
                    返回顶部
                </a>
            </div>
            <div id="discuz_tips" style="display:none;">
            </div>
        </div>
        </div>
    </body>
</html>