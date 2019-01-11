@extends('home.layout.index')

@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
  <link rel="stylesheet" id="css_widthauto" type="text/css" href="/home/css/style_6_widthauto.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_forum_guide.css" /> 
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_forum_guide.css" /> 
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
   <li style="display: none;"><a href="home.php?mod=magic" style="background-image:url(images/magic_b.png) !important">道具</a></li> 
   <li style="display: none;"><a href="home.php?mod=medal" style="background-image:url(images/medal_b.png) !important">勋章</a></li> 
   <li style="display: none;"><a href="home.php?mod=task" style="background-image:url(images/task_b.png) !important">任务</a></li> 
   <li><a href="home.php?mod=spacecp">设置</a></li> 
   <li><a href="home.php?mod=space&amp;do=favorite&amp;view=me">我的收藏</a></li> 
   <li></li> 
   <li></li> 
   <li></li> 
   <li></li> 
   <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=ecb4cf5f">退出</a></li> 
  </ul> 
  <ul class="sub_menu" id="l_menu" style="display: none;"> 
   <!-- 第三方登录 --> 
   <li class="user_list app_login"><a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login"><i class="i_qq"></i>腾讯QQ</a></li> 
   <li class="user_list app_login"><a href="wechat-login.html"><i class="i_wb"></i>微信登录</a></li> 
  </ul> 
  <div id="wp" class="wp time_wp cl">
   <link rel="stylesheet" type="text/css" href="/home/css/guide.css" /> 
   <style type="text/css">

.xl2 { background: url(images/vline.png) repeat-y 50% 0; }

.xl2 li { width: 49.9%; }

.xl2 li em { padding-right: 10px; }

.xl2 .xl2_r em { padding-right: 0; }

.xl2 .xl2_r i { padding-left: 10px; }

</style> 
   <div id="pt" class="bm cl"> 
    <div class="z"> 
     <a href="./" class="nvhm" title="首页">玩车达人</a>
     <em>&raquo;</em>
     <a href="/home/index">首页</a>
     <em></em>
     <a href="/home/articles">文章</a> 
     <em>›</em>
     @if($flag == 0)
     <a href="javascript:;"></a>
     @elseif($flag == 1)
     <a href="javascript:;">最新热门</a>
     @elseif($flag == 2)
     <a href="javascript:;">最新精华</a>
     @elseif($flag == 3)
     <a href="javascript:;">最新发表</a>
     @elseif($flag == 4)
     <a href="javascript:;">我的帖子</a>
     @endif
    </div> 
   </div> 
   <div class="boardnav"> 
    <div id="ct" class="wp cl"> 
     <div class="mn" style="padding: 0 0 5px 0; margin: 10px 0 0 0; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border-radius: 0; background: #FFFFFF;"> 
      <div class="bm bml pbn" style="display: none;"> 
       <div class="bm_h cl"> 
        <span class="y"> <a href="forum.php?mod=guide&amp;view=newthread&amp;rss=1" class="fa_rss" target="_blank" title="RSS">订阅</a> </span> 
        <h1 class="xs2"> 最新发表 </h1> 
       </div> 
       <div class="bm_c cl pbn"> 
        <div style=";" id="forum_rules_1163"> 
         <div class="ptn xg2"></div> 
        </div> 
       </div> 
      </div> 
      <div id="pgt" class="bm bw0 pgs cl" style="display: none;"> 
       <a onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&amp;action=nav"><img src="/home/picture/pn_post.png" alt="发新帖" /></a> 
      </div> 
      <ul id="thread_types" class="ttp bm cl"> 
       <li @if($id == 1) class = "xw1 a" @endif ><a href="/home/articles/{{ 1 }}">最新热门<span></span></a></li> 
       <li @if($id == 2) class = "xw1 a" @endif ><a href="/home/articles/{{ 2 }}">最新精华<span></span></a></li> 
       <li @if($id == 3) class = "xw1 a" @endif ><a href="/home/articles/{{ 3 }}">最新发表<span></span></a></li> 
       <li @if($id == 4) class = "xw1 a" @endif ><a href="/home/articles/{{ 4 }}">我的帖子<span></span></a></li> 
      </ul> 
      <div id="threadlist" class="tl bm bmw"> 
       <div class="th" style="display: none;"> 
        <table cellspacing="0" cellpadding="0"> 
         <tbody>
          <tr> 
           <th colspan="2"> 标题 </th> 
           <td class="by">版块/群组</td> 
           <td class="by">作者</td> 
           <td class="num">回复/查看</td> 
           <td class="by">最后发表</td> 
          </tr> 
         </tbody>
        </table> 
       </div> 
       <div class="bm_c" style="margin: 0 12px;"> 
        <div id="forumnew" style="display:none"></div> 
        <table cellspacing="0" cellpadding="0"> 

          @foreach($data as $k => $v)
          <div class="hideshow">
              <tr> 
               <td class="icn"> 
                <div class="time_reply"> 
                 <a href="thread-21-1-1.html" target="_blank" title="3 个回复">{{  $v->count }}</a> 
                </div> </td> 
               <th class="common"> 
                <div class="top_line cl"> 
                 <div class="z tags">
                  <a href="forum-38-1.html" target="_blank">{{ $v->getCate->cname }}</a>
                 </div> 
                 <a href="/home/articles/{{ $v->id }}/edit" target="_blank" class="xst thread_tit" style="font-weight: 400;">{{$v->title}}</a> 
                 <img src="/home/picture/image_s.gif" alt="attach_img" title="图片附件" align="absmiddle" /> 
                </div> 
                <div class="post_info cl" style="margin: 10px 12px 0 2px;"> 
                 <div class="z"> 
                  <a href="space-uid-1.html" c="1">{{ $v->getName->uname }}</a> / 
                  <span>{{ date('Y - m - d'),$v->ctime }}</span> 
                 </div> 
                 <div class="y"> 
                  <a href="space-username-admin.html" c="1">{{ $v->getName->uname }}</a> / 
                  <a href="forum.php?mod=redirect&amp;tid=21&amp;goto=lastpost#lastpost">{{ date('Y - m -d H:i:s'),$v->ctime }}</a> 
                 </div> 
                </div> 
              </th>
            </tr>
          </div>
          @endforeach 
        
        </table> 
       </div> 
      </div> 
     </div> 
     <div class="bm bw0 pgs cl" style="margin: 15px 0 0 0;"> 
      <span class="pgb y"><a href="/home/articles" style="padding: 5px 12px; border-radius: 0; border: 0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">文章首页</a></span> 
     </div> 
    </div> 
   </div> 
   <div id="filter_special_menu" class="p_pop" style="display:none"> 
    <ul> 
     <li><a href="home.php?mod=space&amp;do=poll&amp;view=me" target="_blank">投票</a></li> 
     <li><a href="home.php?mod=space&amp;do=trade&amp;view=me" target="_blank">商品</a></li> 
     <li><a href="home.php?mod=space&amp;do=reward&amp;view=me" target="_blank">悬赏</a></li> 
     <li><a href="home.php?mod=space&amp;do=activity&amp;view=me" target="_blank">活动</a></li> 
    </ul> 
   </div> 
  </div> 

     <script type="text/javascript">
      $(function(){
        $('#thread_types li').mouseover(function(){
          $(this).addClass('xw1 a');
        }).mouseout(function(){
          $(this).removeClass('xw1 a');
        });
      });

    </script> 
 @endsection