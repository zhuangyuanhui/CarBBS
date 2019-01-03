@extends('home.layout.index')
@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" /> 
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
                            <div class="bm_h" id="main_hnav" style="padding-left: 20px; height: 70px; line-height: 50px; border-bottom: 0; background: none;">
                                <h3 id="layer_reginfo_t" style="height: 70px; line-height: 50px; padding-top: 10px; font-size: 24px; font-weight: bold; color: #CCCCCC;">
                                    找回密码
                                </h3>
                            </div>
                            <p id="returnmessage4">
                            </p>

                            <form method="post" autocomplete="off" name="register" 
                            enctype="multipart/form-data" return false;" action="/home/login/alert">
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
                                                                请输入要找回密码的用户名
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
                                                                请输入该用户名绑定的手机号
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
                                                            <input type="text" id="tel_code" name="tel_code"  autocomplete="off" size="25" tabindex="1"
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
                                            <div class="rfm">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <span class="rq">
                                                                *
                                                            </span>
                                                            <label for="h7b79Y">
                                                                新密码:
                                                            </label>
                                                        </th>
                                                        <td>
                                                            <input type="password" id="upwd_name" name="upwd" size="25" tabindex="1" class="px preg"
                                                            required />
                                                        </td>
                                                        <td class="tipcol">
                                                            <i id="upwd_content" class="p_tip" style="display: none">
                                                                请填写新密码,以字母开头, 最小长度为 6 个字符
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
                                            <span id="seccode_cSeL39bp" class="seccode_1">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="rfm mbw bw0" style="text-align: center">
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
                                                            确认找回
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
                            jQuery(function(){   
                                //标识符   全为true时才可提交注册                         
                               var isUname,isUpwd,isReupwd,isPhone = false;

                                //给所有input框绑定聚焦事件
                                jQuery('.preg').focus(function(){
                                    jQuery(this).parent().next().children([0]).css('display','block');
                                });

                                //用户名框绑定失焦事件
                               jQuery('#users_name').keyup(function(){
                                    var uname_preg = /^[a-zA-Z]{1}[\w]{4,15}$/;
                                    var uname_val = jQuery('#users_name').val();
                                   //正则判断用户名格式
                                    if(uname_preg.test(uname_val)){
                                        var url = "/home/login/checkname/" + uname_val;
                                        //发送ajax检测账号是否存在
                                        jQuery.get(url,{'uname':uname_val},function(data){
                                            if(data.code == 'success'){
                                                //用户名存在,可修改密码
                                                 isUname = true;
                                                 jQuery('#users_name').parent().next().children([0]).html('');
                                            }else{
                                                 //用户名不存在,改变标识符值
                                                isUname = false;
                                                jQuery('#users_name').parent().next().children([0]).html('该用户不存在');
                                                jQuery('#users_name').parent().next().children([0]).css('color','green');
                                            }
                                        },'json');
                                    }else{
                                        isUname = false;
                                        jQuery(this).parent().next().children([0]).html('用户名格式不正确');
                                        jQuery(this).parent().next().children([0]).css('color','red');
                                    }
                               });

                               //给密码框绑定失焦事件
                               jQuery('#upwd_name').keyup(function(){
                                    var upwd_preg = /^[a-zA-Z]{1}/;
                                    var upwd_val = jQuery('#upwd_name').val();
                                  
                                    //正则匹配密码格式
                                    if( upwd_val.length < 5 ){
                                        jQuery(this).parent().next().children([0]).html('密码长度不得少于6位');
                                        jQuery(this).parent().next().children([0]).css('color','red');
                                    }else if(upwd_preg.test(upwd_val)){

                                        //验证密码强度
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
                                            jQuery(this).parent().next().children([0]).html('密码为弱');
                                                break;
                                            case 2:
                                            jQuery(this).parent().next().children([0]).html('密码为中');
                                                break;
                                            case 3:
                                            jQuery(this).parent().next().children([0]).html('密码为强');
                                                break;
                                            case 4:
                                            jQuery(this).parent().next().children([0]).html('密码为超强');
                                                break;
                                        }
                                            //确认密码框绑定失焦事件
                                            jQuery('#reupwd_name').keyup(function(){
                                                 var reupwd_val = jQuery('#reupwd_name').val();
                                                 var upwd_val = jQuery('#upwd_name').val();
                                                 //判断两次输入的密码是否一致
                                                if( upwd_val == reupwd_val){
                                                    isReupwd = true;
                                                    jQuery(this).parent().next().children([0]).html('恭喜密码一致');
                                                    jQuery(this).parent().next().children([0]).css('color','green');
                                                }else{
                                                    isReupwd = false;
                                                     jQuery(this).parent().next().children([0]).html('两次密码不一致');
                                                      jQuery(this).parent().next().children([0]).css('color','red');
                                                }
                                            });
                                    }else{
                                        jQuery(this).parent().next().children([0]).html('密码格式不正确');
                                        jQuery(this).parent().next().children([0]).css('color','red');

                                    }                                  
                               });
                            
                            //给手机输入框绑定失焦事件
                            jQuery('#tel_name').keyup(function(){
                                 var tel_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                                 var tel_val = jQuery('#tel_name').val();
                                 var uname_val = jQuery('#users_name').val(); 
                                 //正则判断手机号格式是否正确
                                if(tel_preg.test(tel_val)){

                                    jQuery(this).parent().next().children([0]).html('手机号格式正确');
                                    jQuery(this).parent().next().children([0]).css('color','green');

                                    var tel_url = "/home/login/checktel/" + tel_val;

                                    //发送ajax检测手机号是否为该用户的绑定手机号
                                    jQuery.get(tel_url,{'tel':tel_val},function(data){
                                        if(data.code == 'success'){
                                            isPhone = true;
                                            jQuery('#tel_name').parent().next().children([0]).html('');

                                            var time = 5;
                                            var flag = true;   //设置点击标记，防止5内再次点击生效
                                            //发送验证码
                                            jQuery('#dyMobileButton').click(function(){
                                                jQuery(this).attr("disabled",true);
                                                if(flag){
                                                    var timer = setInterval(function () {
                                                        if(time == 5 && flag){
                                                            flag = false;
                                                            var tel_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                                                             var tel = jQuery('#tel_name').val();
                                                               if(!tel_preg.test(tel)){
                                                                return false;
                                                               }
                                                                var url = '/home/login/send/'+tel;
                                                            jQuery.get(url,{'tel':tel},function(data){
                                                                //接受短信发送结果
                                                                if(data.code == 2){
                                                                    jQuery("#dyMobileButton").html("已发送");
                                                                }else{
                                                                    flag = true;
                                                                    time = 5;
                                                                    clearInterval(timer);
                                                                }
                                                           },'json');
                                                        }else if(time == 0){
                                                            jQuery("#dyMobileButton").removeAttr("disabled");
                                                            jQuery("#dyMobileButton").html("免费获取验证码");
                                                            clearInterval(timer);
                                                            time = 5;
                                                            flag = true;
                                                        }else {
                                                            jQuery("#dyMobileButton").html(time + " s 重新发送");
                                                            time--;
                                                        }
                                                    },1000);
                                                 }
                                             });
                                        }else{
                                            isPhone = false;
                                            jQuery('#tel_name').parent().next().children([0]).html('手机号不正确');
                                            jQuery('#tel_name').parent().next().children([0]).css('color','red');
                                        }
                                    },'json');

                                }else{
                                    isPhone = false;
                                    jQuery(this).parent().next().children([0]).html('手机号格式不正确');
                                     jQuery(this).parent().next().children([0]).css('color','red');
                                }
                            });

                            //注册按钮点击事件,当用户名,手机,密码都正确才能发送提交
                            jQuery('#registerformsubmit').click(function(){
                                if(isUname&&isPhone&&isReupwd){
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
                                    <button class="pn pnc" onclick="jQuery('agreebbrule').checked = true;hideMenu('fwin_dialog', 'dialog');">
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
@endsection