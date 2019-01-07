@extends('home/layout/index')

@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
<link rel="stylesheet" id="css_widthauto" type="text/css" href="/home/css/style_6_widthauto.css" />
<link rel="stylesheet" type="text/css" href="/home/css/member.css" />
<script src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js" type="text/javascript"></script>

<div id="wp" class="wp time_wp cl">
  <link rel="stylesheet" type="text/css" href="css/member.css" />
  <div id="background" class="background">
    <div class="filter"></div>
  </div>
  <div class="mheight" style="width: 400px; margin: 0 auto;">
    <div id="ct" class="wp w cl" style="padding: 100px 0 100px 0;">
      <div class="nfl" id="main_succeed" style="display: none">
        <div class="f_c altw">
          <div class="alert_right">
            <p id="succeedmessage"></p>
            <p id="succeedlocation" class="alert_btnleft"></p>
            <p class="alert_btnleft">
              <a id="succeedmessage_href">如果您的浏览器没有自动跳转，请点击此链接</a></p>
          </div>
        </div>
      </div>
      <div class="mn" id="main_message">
        <div class="ldLoginIntro cl" style="float: left; width: 450px;">
          <div class="login-content cl" style="display: none;">
            <div class="l intro">
              <h1>Join us!</h1>
              <p>搜集国内一手新鲜资讯，
                <br>共同打造大型完整互助休闲社区！
                <br></p>
              <a href="portal.php">进入首页</a></div>
          </div>
        </div>
        <div class="login_ie comForm cl" style="float: right; width: auto; border: 0; padding: 20px 40px; box-shadow: 0 5px 15px rgba(0,0,0,.5);">
          <div class="hd cl" style="padding-top: 20px;">
            <span>登录账号</span></div>
          <div style="text-align: center;">
            <div id="main_messaqge_LTh70">
              <div id="layer_login_LTh70">
                <h3 class="flb">
                  <em id="returnmessage_LTh70"></em>
                  <span></span>
                </h3>
                <form method="post" autocomplete="off" name="login" id="loginform_LTh70" class="cl"  action="/home/login/dologin">
                  {{ csrf_field() }}
                  <div class="pg_login c cl" style="overflow: hidden;">
                    <input type="hidden" name="formhash" value="dfa1e3c8" />
                    <input type="hidden" name="referer" value="http://quaters.cn/display/che/./" />
                    <div class="rfm">
                      <table>
                        <tr>
                          <td>
                            <input type="text" name="phone" id="username_LTh70" autocomplete="off" size="30" class="form-control px p_fre" tabindex="1" value="{{ old('phone') }}" placeholder="用户名或者手机号" title="用户名或者手机号" />
                          </td>
                          <td class="tipcol" style="display: none;">
                            <a href="member.php?mod=register">立即注册</a>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="rfm">
                      <table>
                        <tr>
                          <td>
                            <h4 id="checkname">&nbsp;</h4>
                          </td>
                          <td class="tipcol" style="display: none;">
                            <a href="member.php?mod=register">立即注册</a>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="rfm">
                      <table>
                        <tr>
                          <td>
                            <input type="password" id="password3_LTh70" name="upwd" onfocus="clearpwd()" size="30" class="form-control px p_fre" tabindex="1" placeholder="密码" title="密码" /></td>
                          <td class="tipcol" style="display: none;"></td>
                        </tr>
                      </table>
                    </div>
                    <div class="rfm">
                      <table>
                        <tr>
                          <td>
                            <h4 id="checkupwd">&nbsp</h4>
                          <td class="tipcol" style="display: none;"></td>
                        </tr>
                      </table>
                    </div>
                    <div class="rfm" id="loginanswer_row_LTh70" style="display:none">
                      <table>
                        <tr>
                          <td>
                            <input type="text" name="answer" id="loginanswer_LTh70" autocomplete="off" size="30" class="px p_fre" tabindex="1" /></td>
                        </tr>
                      </table>
                    </div>
                    <span id="seccode_cSbZq7w7" class="seccode_1"></span>
                    <script type="text/javascript" reload="1">updateseccode('cSbZq7w7', '<div class="rfm"><table><tr><th><sec>: </th><td><sec><br /><sec></td></tr></table></div>', 'member::logging');</script>
                    <div class="rfm  cl">
                      <!-- 找回密码 -->
                      <a href="/home/login/forget"  title="找回密码" style="float: right; padding: 9px 0 0 3px; color: #BBBBBB; font-size: 12px;">忘记登录密码</a></div>
                    <div class="rfm bw0 cl">
                      <div class="login_btn cl" style="float: left; margin: 10px 0;">
                        <button class="pn pnc" type="submit" name="loginsubmit" value="true" tabindex="1">提交</button></div>
                      <div style="display: none;">
                        <a href="javascript:;" onclick="ajaxget('member.php?mod=clearcookies&formhash=dfa1e3c8', 'returnmessage_LTh70', 'returnmessage_LTh70');return false;" title="清除痕迹" class="y">清除痕迹</a></div>
                    </div>
                    <div class="rfm" style="padding: 5px 0 0 0; text-align: center;">
                      <a href="/home/users/create" style="float: none; height: 44px; line-height: 44px; color: #333333; font-size: 16px;">极速注册</a></div>
                    <div class="third-box">
                      <div class="tits">
                        <span>第三方登录</span></div>
                      <a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login">
                        <i class="icon-modal icon-login-qq"></i>
                      </a>
                      <a href="wechat-login.html" class="js-login-switch">
                        <i class="icon-modal icon-login-wx"></i>
                      </a>
                      <a href="#" style="display: none;">
                        <i class="icon-modal icon-login-wb"></i>
                      </a>
                      <a href="#" style="display: none;">
                        <i class="icon-modal icon-login-zfb"></i>
                      </a>
                    </div>
                    <div class="other_login"></div>
                  </div>
                </form>
              </div>
              <div id="layer_lostpw_LTh70" style="display: none;">
                <h3 class="flb">
                  <em id="returnmessage3_LTh70">找回密码</em>
                  <span></span>
                </h3>
                <form method="post" autocomplete="off" id="lostpwform_LTh70" class="cl" onsubmit="ajaxpost('lostpwform_LTh70', 'returnmessage3_LTh70', 'returnmessage3_LTh70', 'onerror');return false;" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">
                  <div class="c cl">
                    <input type="hidden" name="formhash" value="dfa1e3c8" />
                    <input type="hidden" name="handlekey" value="lostpwform" />
                    <div class="rfm">
                      <table>
                        <tr title="Email/邮箱">
                          <th>
                            <span class="rq">*</span>
                            <label for="lostpw_email">Email:</label></th>
                          <td>
                            <input type="text" name="email" id="lostpw_email" size="30" value="" tabindex="1" class="px p_fre" placeholder="Email/邮箱" /></td>
                        </tr>
                      </table>
                    </div>
                    <div class="rfm">
                      <table>
                        <tr title="用户名">
                          <th>
                            <label for="lostpw_username">用户名:</label></th>
                          <td>
                            <input type="text" name="username" id="lostpw_username" size="30" value="" tabindex="1" class="px p_fre" placeholder="用户名" /></td>
                        </tr>
                      </table>
                    </div>
                    <div class="rfm mbw bw0">
                      <table>
                        <tr>
                          <th></th>
                          <td>
                            <button class="pn pnc" type="submit" name="lostpwsubmit" value="true" tabindex="100">
                              <span>提交</span></button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div id="layer_message_LTh70" class="f_c blr nfl" style="display: none;">
              <h3 class="flb" id="layer_header_LTh70"></h3>
              <div class="c">
                <div class="alert_right">
                  <div id="messageleft_LTh70"></div>
                  <p class="alert_btnleft" id="messageright_LTh70"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  //给手机号框绑定失焦事件
    $('#username_LTh70').blur(function(){
        var phone = $(this).val();
        var url = '/home/login/checkphone/' + phone;

         var tel_preg = /^1{1}[3-9]{1}[\d]{9}$/;
         //验证手机号格式是否正确,正确发送ajax验证手机号是否已被注册
         if(tel_preg.test(phone)){
              $.get(url,{'phone':phone},function(data){
                    if(data.code == 'error'){
                      $('#checkname').html('手机号不存在');
                      $('#checkname').css('color','red');
                    }
              },'json');
          }else{
                $('#checkname').html('手机号格式不正确');
          }
      }).focus(function(){
        $('#checkname').html('&nbsp;');
      });
</script>
@endsection