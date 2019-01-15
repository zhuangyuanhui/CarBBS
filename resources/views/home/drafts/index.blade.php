@extends('home.layout.index')

@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" /> 
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="mus_box cl"> 
   <div id="mus" class="wp cl"> 
   </div> 
  </div> 
  <div id="qmenu_menu" class="p_pop blk" style="display: none;"> 
   <div class="ptm pbw hm">
     请 
    <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航
    <br />没有帐号？
    <a href="member.php?mod=register" class="xi2 xw1">立即注册</a> 
   </div> 
   <div id="fjump_menu" class="btda"></div>
  </div> 
  <ul class="p_pop h_pop" id="plugin_menu" style="display: none"> 
   <li><a href="dsu_paulsign-sign.html" id="mn_plink_sign">每日签到</a></li> 
  </ul> 
  <!-- 二级导航 --> 
  <div class="sub_nav"> 
   <ul class="p_pop h_pop" id="mn_P1_menu" style="display: none">
    <li><a href="http://quaters.cn/display/che/portal.php?mod=list&amp;catid=3" hidefocus="true">二手车</a></li>
    <li><a href="http://quaters.cn/display/che/portal.php?mod=list&amp;catid=2" hidefocus="true">SUV</a></li>
    <li><a href="http://quaters.cn/display/che/portal.php?mod=list&amp;catid=8" hidefocus="true">改装</a></li>
    <li><a href="http://quaters.cn/display/che/portal.php?mod=list&amp;catid=7" hidefocus="true">汽车横评</a></li>
   </ul>
   <div class="p_pop h_pop" id="mn_userapp_menu" style="display: none"></div>
   <ul class="p_pop h_pop" id="mn_N708e_menu" style="display: none">
    <li><a href="brands" hidefocus="true">品牌页</a></li>
    <li><a href="group.php" hidefocus="true">群组页</a></li>
    <li><a href="thread-21-1-1.html" hidefocus="true">活动页</a></li>
    <li><a href="forum.php?mod=guide&amp;view=newthread" hidefocus="true">导读页</a></li>
    <li><a href="thread-20-1-1.html" hidefocus="true">帖子页</a></li>
    <li><a href="home.php?mod=space&amp;uid=6&amp;do=profile" hidefocus="true">个人空间</a></li>
    <li><a href="misc.php?mod=ranklist" hidefocus="true">排行榜单</a></li>
    <li><a href="member.php?mod=logging&amp;action=login" hidefocus="true">登陆页面</a></li>
   </ul> 
  </div> 
  <!-- 用户菜单 --> 
  <ul class="sub_menu" id="m_menu" style="display: none;"> 
   <li style="display: none;"><a href="home.php?mod=magic" style="background-image:url(/home/images/magic_b.png) !important">道具</a></li> 
   <li style="display: none;"><a href="home.php?mod=medal" style="background-image:url(/home/images/medal_b.png) !important">勋章</a></li> 
   <li style="display: none;"><a href="home.php?mod=task" style="background-image:url(/home/images/task_b.png) !important">任务</a></li> 
   <li><a href="home.php?mod=spacecp">设置</a></li> 
   <li><a href="home.php?mod=space&amp;do=favorite&amp;view=me">我的收藏</a></li> 
   <li></li> 
   <li></li> 
   <li></li> 
   <li></li> 
   <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=71293015">退出</a></li> 
  </ul> 
  <ul class="sub_menu" id="l_menu" style="display: none;"> 
   <!-- 第三方登录 --> 
   <li class="user_list app_login"><a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login"><i class="i_qq"></i>腾讯QQ</a></li> 
   <li class="user_list app_login"><a href="wechat-login.html"><i class="i_wb"></i>微信登录</a></li> 
  </ul> 
  <div id="wp" class="wp time_wp cl">
   <div id="pt" class="bm cl"> 
    <div class="z"> 
     <a href="./" class="nvhm" title="首页">玩车达人</a> 
     <em>›</em> 
     <a href="space-uid-6.html">方希</a> 
     <em>›</em> 个人资料 
    </div> 
   </div> 
   <style id="diy_style" type="text/css"></style> 
   <div class="wp"> 
    <!--[diy=diy1]-->
    <div id="diy1" class="area"></div>
    <!--[/diy]--> 
   </div>
   <link rel="stylesheet" type="text/css" href="/home/css/home.css" /> 
  </div> 
  <div style="width: 1080px; margin: 0 auto; box-shadow: 1px 1px 3px rgba(0,0,0,0.1); border-radius: 0; overflow: hidden; background: #FFFFFF;"> 
   <div id="uhd"> 
    <div class="space_h cl"> 
     <div class="icn cl">
      <a href="#"><img src="/uploads/{{$users->getUserInfo->face}}" /></a>
     </div> 
     <h2 class="mt"> {{$users->nickname}} </h2> 
     <p class="follow_us"> 
      <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="#" class="new1">我的关注</a>
      <a href="#" id="a_friend_li_6" onclick="showWindow(this.id, this.href, 'get', 0);" class="xi2 new1">我的粉丝</a>
      <a href="/home/message" id="a_sendpm_6" onclick="showWindow('showMsgBox', this.href, 'get', 0)" title="发送消息" class="old1">我的私信</a>
      <script type="text/javascript">

      function succeedhandle_followmod(url, msg, values) {

      var fObj = $('followmod');

      if(values['type'] == 'add') {

      fObj.innerHTML = '取消收听';

      fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];

      } else if(values['type'] == 'del') {

      fObj.innerHTML = '收听TA';

      fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=71293015&fuid='+values['fuid'];

      }

      }

</script> </p> 
     <p class="manage cl"> <a href="http://quaters.cn/display/che/?6" class="xg1" style="display: none;">http://quaters.cn/display/che/?6</a> </p> 
    </div> 
   </div> 
   <div class="wp cl"> 
    <div class="space_nav cl"> 
     <ul class="tb_1 cl"> 
      <li><a href="/home/articles/create"><img src="picture/space_profile.png" class="vm" />编辑文章</a></li> 
      <li class="a"><a href="javascript:;"><img src="picture/space_follow.png" class="vm" />草稿箱</a></li> 
     </ul> 
    </div> 
   </div> 
   <div id="ct" class="ct1 wp cl" > 
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
        <table class="table table-hover">
          <tr>
            <td>ID</td>
            <td>标题</td>
            <td>类型</td>
            <td>操作</td>
          </tr>
          @foreach($drafts as $k => $v)
          <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->getCates->cname }}</td>
            <td>
              <form action="/home/drafts/{{ $v->id }}" method="post" style="display: inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" value="删除" onclick="return confirm('确认删除??')" name="" class="btn btn-danger">
              </form>
              <a href="/home/drafts/{{ $v->id }}/edit"><span class="btn btn-info">修改</span></a>
            </td>
         
          </tr>
          @endforeach
        </table>


        <div class="mn"> 
         <!--[diy=diycontenttop]-->
         <div id="diycontenttop" class="area"></div>
         <!--[/diy]--> 
         <div class="bm bw0"> 


      </div> 
     </div> 
    </div> 
   </div> 
   <div class="wp mtn"> 
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--> 
   </div> 
  </div> 
@endsection