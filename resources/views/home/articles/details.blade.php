@extends('home.layout.index')
@section('content')
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_forum_viewthread.css" /> 
  <div id="wp" class="wp time_wp cl">
   <script type="text/javascript">var fid = parseInt('2'), tid = parseInt('10');</script> 
   <script src="/home/js/forum_viewthread.js" type="text/javascript"></script> 
   <script type="text/javascript">zoomstatus = parseInt(1);var imagemaxwidth = '720';var aimgcount = new Array();</script> 
   <style id="diy_style" type="text/css"></style> 
   <!--[diy=diynavtop]-->
   <div id="diynavtop" class="area"></div>
   <!--[/diy]--> 
   <div id="pt" class="bm cl"> 
    <div class="z">
     <a href="forum.php">论坛</a> 
     <em>›</em> 
     <a href="forum.php?gid=1">骑行天下</a> 
     <em>›</em> 
     <a href="forum-2-1.html">产品讨论</a> 
     <em>›</em> 
     <a href="thread-10-1-1.html">查看内容</a> 
    </div> 
    <div class="y" style="display: none;"> 
     <a href="forum.php?mod=viewthread&amp;action=printable&amp;tid=10" title="打印" target="_blank"><img src="/home/picture/print.png" alt="打印" class="vm" /></a> 
     <a href="forum.php?mod=redirect&amp;goto=nextoldset&amp;tid=10" title="上一主题"><img src="/home/picture/thread-prev.png" alt="上一主题" class="vm" /></a> 
     <a href="forum.php?mod=redirect&amp;goto=nextnewset&amp;tid=10" title="下一主题"><img src="/home/picture/thread-next.png" alt="下一主题" class="vm" /></a> 
    </div> 
   </div> 
   <script src="/home/js/jquery-1.4.4.min.js" type="text/javascript"></script>
   <script type="text/javascript">jQuery.noConflict();</script>
   <script type="text/javascript">(function(d){j=d.createElement('script');j.src='//openapi.guanjia.qq.com/fcgi-bin/getdzjs?cmd=urlquery_gbk_zh_cn';j.setAttribute('ime-cfg','lt=2');d.getElementsByTagName('head')[0].appendChild(j)})(document)</script>
   <link rel="stylesheet" type="text/css" href="/home/css/style.css" />
   <style id="diy_style" type="text/css"></style> 
   <div class="wp"> 
    <!--[diy=diy1]-->
    <div id="diy1" class="area"></div>
    <!--[/diy]--> 
   </div> 
   <div id="ct" class="wp ct2 cl"> 
    <div class="cl"> 
     <div class="sd"> 
      <div class="itofeedback cl"> 
       <a class="bluebigbutton" onclick="showWindow('newthread', 'forum.php?mod=post&amp;action=newthread&amp;fid=2')" href="javascript:;" title="发新帖">发新帖</a> 
       <a href="dsu_paulsign-sign.html" target="_blank" id="sign" class="greenbigbutton" title="签到" style="margin-right: 0;">签到SIGN</a> 
      </div> 
      <script type="text/javascript"></script>
      <div class="quater_author_info cl"> 
       <div class="quater_author_info_1 cl"> 
        <a href="space-uid-1.html" target="_blank" class="toux"><img src="/home/picture/avatar.php" /></a> 
        <p><a href="space-uid-1.html" target="_blank">admin</a> </p> 
        <p style="margin-top: 3px;"><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=1" target="_blank" style="color: #FF0000;">管理员</a></p> 
        <div class="time_thread_stat cl"> 
         <ul> 
          <li><a>91</a><p>积分</p></li> 
          <li><a>20</a><p>帖子</p></li> 
          <li style="border-right: 0;"><a>3</a><p>精华</p></li> 
         </ul> 
        </div> 
       </div> 
       <div class="quater_author_info_3 cl" style="background: #F9F9F9;"> 
        <div class="s_timeline s_timeline2 cl" style="margin: 0 20px 20px 20px;"> 
         <ul style="border-top: 0;"> 
          @foreach($click as $k => $v)
          <li><i><span></span></i><a href="thread-20-1-1.html" target="_blank">{{ $v->title }}</a><p></p></li> 
         @endforeach
         </ul> 
        </div> 
       </div> 
      </div> 
      <!--[diy=diy_right_1]-->
      <div id="diy_right_1" class="area">
       <div id="framek44e44" class="frame move-span cl frame-1">
        <div id="framek44e44_left" class="column frame-1-c">
         <div id="framek44e44_left_temp" class="move-span temp"></div>

        </div>
       </div>

       <div id="tabadpq6D" class="tab2 frame-tab move-span cl">
        <div id="tabadpq6D_title" class="tab-title title column cl" switchtype="mouseover">
         <div id="portal_block_213" class="block move-span">
          <div class="blocktitle title">
           <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">便民服务</span>
          </div>
          <div id="portal_block_213_content" class="dxb_bc">
           <div class="portal_block_summary">
            <div class="_helplidelist"> 
             <div style="display: block;"> 
              <div class="grid_list"> 
               <ul> 
                <li><a href="#" target="_blank"><span class="grid_list_img"><img src="/home/picture/s_customer.png" height="30" width="30" /></span>在线咨询</a></li> 
                <li><a href="#" target="_blank"><span class="grid_list_img"><img src="/home/picture/s_map.png" height="30" width="30" /></span>公司地址</a></li> 
                <li><a href="#" target="_blank"><span class="grid_list_img"><img src="/home/picture/s_service.png" height="30" width="30" /></span>服务中心</a></li> 
               </ul> 
              </div> 
              <div class="customer_service"> 
               <h4 class="fullfont color">400-8826-226</h4> 
               <p class="font12 color3">电话服务热线时间：9:00 - 21:00</p> 
              </div> 
             </div> 
            </div>
           </div>
          </div>
         </div>
         <div id="portal_block_215" class="block move-span">
          <div class="blocktitle title">
           <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">关注我们</span>
          </div>
          <div id="portal_block_215_content" class="dxb_bc">
           <div class="portal_block_summary">
            <div class="snswidget" style="display: block;"> 
             <div class="sns_widget">
              <a href="#" title="ZUK官方微博" target="_blank"><img src="/home/picture/wb_sidebar.jpg" height="120" width="120" /></a> 
              <p><a href="#" target="_blank" title="ZUK官方微博">官方微博</a></p> 
             </div> 
             <div class="sns_widget">
              <img src="/home/picture/wx.png" title="扫一扫关注微信" height="120" width="120" /> 
              <p>ZUK微信</p> 
             </div> 
            </div>
           </div>
          </div>
         </div>
         <div id="portal_block_214" class="block move-span">
          <div class="blocktitle title">
           <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">社区新手</span>
          </div>
          <div id="portal_block_214_content" class="dxb_bc">
           <div class="portal_block_summary">
            <div class="forum_newbie" style="display: block;"> 
             <ul class="top_list cl"> 
              <a href="#" target="_blank"><span class="a_arrow"></span>发帖回复</a> 
              <a href="#" target="_blank"><span class="a_arrow"></span>社区版规</a> 
              <a href="#" target="_blank"><span class="a_arrow"></span>金币达人</a> 
              <a href="#" target="_blank"><span class="a_arrow"></span>任务体系</a> 
              <a href="#" target="_blank"><span class="a_arrow"></span>荣誉勋章</a> 
              <a href="#" target="_blank"><span class="a_arrow"></span>会员认证</a> 
             </ul> 
            </div>
           </div>
          </div>
         </div>
        </div>
        <div id="tabadpq6D_content" class="tb-c"></div>
        <script type="text/javascript">initTab("tabadpq6D","mouseover");</script>
       </div>
      </div>
      <!--[/diy]--> 
      <!--[diy=diy_right_2]-->
      <div id="diy_right_2" class="area"></div>
      <!--[/diy]--> 
     </div> 
     <div class="mn"> 
      <div class="box cl" style="padding: 25px 25px 10px 25px; background: #FFFFFF;"> 
       <div class="zprrtt cl"> 
        <div class="moquu_rrskzx"> 
         <div class="moquu_date"> 
          <div class="moquu_rrbt cl"> 
           <div class="css cl"> 
            <div class="moquu_mz cl"> 
             <h1> <a href="thread-10-1-1.html" onclick="return copyThreadUrl(this, '玩车达人')">{{ $article->title }}</a> </h1> 
            </div> 
            <div class="moquu_small"> 
             <p><a href="/home/vip" class=""></a>&copy; <a href="space-uid-1.html" target="_blank">admin</a> <a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=1" target="_blank">管理员</a> &nbsp;&nbsp;/&nbsp;&nbsp;2015-9-6 13:07&nbsp;&nbsp;/&nbsp;&nbsp;<span> <a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=10&amp;formhash=eaea2ab4" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖" class="k_favorite" style="padding-right: 10px;"><i></i>0 人收藏</a> <a href="javascript:void(0)" class="cc1" title="保留作者信息" style="margin-left: 10px;">保留作者信息</a> <a href="javascript:void(0)" class="cc2" title="禁止商业使用（站长自定义文字）">禁止商业使用（站长自定义文字）</a></span></p> 
            </div> 
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
       <div id="postlist" class="pl bm" style="padding: 25px 0 0 0;"> 
        <div id="post_10"> 
         <table id="pid10" class="plhin" summary="pid10" cellspacing="0" cellpadding="0"> 
          <tbody>
           <tr> 
            <td class="plc" style="width:100%">
             <div class="pct"> 
              <style type="text/css">.pcb{margin-right:0}</style>
              <div class="pcb"> 
               <div class="t_fsz"> 
                <table cellspacing="0" cellpadding="0">
                 <tbody>
                  <tr>
                   <td class="t_f" id="postmessage_10"> <font color="#515151">{!! $article->content !!}</font>
                    <div align="center">
                     <font color="#515151"></font>
                     <br /> 
                    </div><br /> </td>
                  </tr>
                 </tbody>
                </table> 
                <div class="attach_nopermission attach_tips"> 
                 <div> 
                  <h3><strong>本帖子中包含更多资源</strong></h3> 
                  <p>您需要 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);return false;">登录</a> 才可以下载或查看，没有帐号？<a href="member.php?mod=register" title="注册帐号">立即注册</a> </p> 
                 </div> 
                 <span class="atips_close" onclick="this.parentNode.style.display='none'">x</span> 
                </div> 
               </div> 
               <div id="comment_10" class="cm"> 
               </div> 
               <div id="post_rate_div_10"></div> 
              </div> 
             </div>  </td>
           </tr> 
           <tr>
            <td class="plc plm"> 
             <div id="p_btn" class="mtw hm cl" style="margin-bottom: 30px;"> 
              <a class="followp" href="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=10&amp;from=forum" onclick="showWindow('relaythread', this.href, 'get', 0);" title="转播求扩散"><i><img src="/home/picture/zhuanbo.png" alt="转播" />转播</i></a> 
              <a class="sharep" href="home.php?mod=spacecp&amp;ac=share&amp;type=thread&amp;id=10" onclick="showWindow('sharethread', this.href, 'get', 0);" title="分享推精华"><i><img src="/home/picture/favorite.png" alt="分享" />分享</i></a> 
              <a href="forum.php?mod=collection&amp;action=edit&amp;op=addthread&amp;tid=10" id="k_collect" onclick="showWindow(this.id, this.href);return false;" onmouseover="this.title = $('collectionnumber').innerHTML + ' 人淘帖'" title="淘好帖进专辑"><i><img src="/home/picture/taotie.png" alt="分享" />淘帖<span id="collectionnumber" style="display:none">0</span></i></a> 
              <a id="recommend_add"> <img src="/home/picture/zan.png" alt="支持" style="margin-top: 3px;" /></a> 
              <a id="recommend_subtract" href="forum.php?mod=misc&amp;action=recommend&amp;do=subtract&amp;tid=10&amp;hash=eaea2ab4" onclick="showWindow('login', this.href)" onmouseover="this.title = $('recommendv_subtract').innerHTML + ' 人反对'" title="踩一下"><i><img src="/home/picture/rec_subtract.png" alt="反对" />反对<span id="recommendv_subtract" style="display:none">0</span></i></a> 
             </div> 
             <div id="viewthread_foot cl"> 
              <div class="viewthread_foot cl" style="margin-bottom: 0; border-bottom: 0;"> 
               <div class="bdsharebuttonbox cl" style="padding: 0 5px 20px 0;"> 
                <em style="padding: 0; background: none; color: #999999;">分享至 :</em> 
                <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a> 
                <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a> 
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a> 
                <a href="#" class="bds_more" data-cmd="more"></a>
               </div> 
               <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script> 
               <span class="cutline" style="margin: 9px 10px 0 0;"></span> 
               <a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=10&amp;formhash=eaea2ab4" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖" class="k_favorite">收藏</a> 
               <div class="y" style="margin-top: 7px;"> 
                <em> <a class="times_fastre" href="forum.php?mod=post&amp;action=reply&amp;fid=2&amp;tid=10&amp;reppost=10&amp;extra=page%3D1&amp;page=1" onclick="showWindow('reply', this.href)"><span></span>回复</a> </em> 
               </div> 
              </div> 
             </div> </td> 
           </tr> 
           <tr id="_postposition10"></tr> 
           <tr> 
            <td class="plc" style=" padding:0;"> </td> 
           </tr> 
          </tbody>
         </table> 
        </div> 
       </div> 
      </div> 
      <!--[diy=diy_like]-->
      <div id="diy_like" class="area"></div>
      <!--[/diy]--> 
      <div class="box cl" style="padding: 25px 25px 0 25px;"> 
       <div class="forum_tag cl" style="padding: 0; margin: 0 0 20px 0; border-top: 0;"> 
        <a title="威廉王子" href="misc.php?mod=tag&amp;id=11" target="_blank">威廉王子</a>
        <a title="创意" href="misc.php?mod=tag&amp;id=12" target="_blank">创意</a>
       </div> 
       <div id="postlist" class="pl bm postlist_reply"> 
        <div class="reply_tit cl"> 
         <h2><strong>0</strong> 个回复</h2> 
        </div> 
        <div id="postlistreply" class="pl">
         <div id="post_new" class="viewthread_table" style="display: none;"></div>
        </div> 
       </div> 
       <form method="post" autocomplete="off" name="modactions" id="modactions"> 
        <input type="hidden" name="formhash" value="eaea2ab4" /> 
        <input type="hidden" name="optgroup" /> 
        <input type="hidden" name="operation" /> 
        <input type="hidden" name="listextra" value="page%3D1" /> 
        <input type="hidden" name="page" value="1" /> 
       </form> 
       <div class="pgs mtm mbm cl" style="padding: 20px 0 0 0;"> 
       </div> 
       <!--[diy=diyfastposttop]-->
       <div id="diyfastposttop" class="area"></div>
       <!--[/diy]--> 
       <div id="md_15_menu" class="tip tip_4" style="display: none;"> 
        <div class="tip_horn"></div> 
        <div class="tip_c"> 
         <h4>金币达人</h4> 
         <p></p> 
        </div> 
       </div> 
       <div id="md_12_menu" class="tip tip_4" style="display: none;"> 
        <div class="tip_horn"></div> 
        <div class="tip_c"> 
         <h4>汽车标兵</h4> 
         <p></p> 
        </div> 
       </div> 
       <div id="md_13_menu" class="tip tip_4" style="display: none;"> 
        <div class="tip_horn"></div> 
        <div class="tip_c"> 
         <h4>签到达人</h4> 
         <p></p> 
        </div> 
       </div> 
       <div id="md_14_menu" class="tip tip_4" style="display: none;"> 
        <div class="tip_horn"></div> 
        <div class="tip_c"> 
         <h4>沙发达人</h4> 
         <p></p> 
        </div> 
       </div> 
       <script type="text/javascript">
new lazyload();
</script> 
       <script type="text/javascript">document.onkeyup = function(e){keyPageScroll(e, 0, 0, 'forum.php?mod=viewthread&tid=10', 1);}</script> 
      </div> 
      <!--[diy=diy_like1]-->
      <div id="diy_like1" class="area">
       <div id="frameU98jC0" class="frame move-span cl frame-1">
        <div id="frameU98jC0_left" class="column frame-1-c">
         <div id="frameU98jC0_left_temp" class="move-span temp"></div>
         <div id="portal_block_211" class="block move-span">
          <div id="portal_block_211_content" class="dxb_bc">
           <div class="news-l-box" style="margin-bottom: 15px;width: 750px; margin-left: 0px;"> 
            <ul style="margin-left: 0px;">
             <dl class="news-l-dl "> 
              <dt>
               <a href="thread-20-1-1.html" title="2015.10.3~10.18 台湾单车环岛"> <img style="display: inline;" src="/home/picture/5a68d36abda3ffd2a7beaa97ffb94a66.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="2015.10.3~10.18 台湾单车环岛" title="2015.10.3~10.18 台湾单车环岛" width="220" height="120" /> </a> 
              </dt> 
              <dd>
               <a href="thread-20-1-1.html" title="2015.10.3~10.18 台湾单车环岛">2015.10.3~10.18 台湾单车环岛</a> 
              </dd> 
             </dl>
             <dl class="news-l-dl "> 
              <dt>
               <a href="thread-14-1-1.html" title="高级电子表Apple Watch零售版首发体验"> <img style="display: inline;" src="/home/picture/9e88cdf60ce5293d26d5bd09ed9e15b4.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="高级电子表Apple Watch零售版首发体验" title="高级电子表Apple Watch零售版首发体验" width="220" height="120" /> </a> 
              </dt> 
              <dd>
               <a href="thread-14-1-1.html" title="高级电子表Apple Watch零售版首发体验">高级电子表Apple Watch零售版首发体验</a> 
              </dd> 
             </dl>
             <dl class="news-l-dl "> 
              <dt>
               <a href="thread-8-1-1.html" title="3月2日聚焦巴塞罗那世界移动通信大会"> <img style="display: inline;" src="/home/picture/989858c95cbc00fe6562a80da29cd309.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="3月2日聚焦巴塞罗那世界移动通信大会" title="3月2日聚焦巴塞罗那世界移动通信大会" width="220" height="120" /> </a> 
              </dt> 
              <dd>
               <a href="thread-8-1-1.html" title="3月2日聚焦巴塞罗那世界移动通信大会">3月2日聚焦巴塞罗那世界移动通信大会</a> 
              </dd> 
             </dl>
            </ul> 
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      <!--[/diy]--> 
      <script type="text/javascript">

var postminchars = parseInt('10');

var postmaxchars = parseInt('10000');

var disablepostctrl = parseInt('0');

</script> 
      <div id="f_pst" class="pl bm bmw"> 
       <form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=2&amp;tid=10&amp;extra=page%3D1&amp;replysubmit=yes&amp;infloat=yes&amp;handlekey=fastpost" onsubmit="return fastpostvalidate(this)"> 
        <table cellspacing="0" cellpadding="0"> 
         <tbody>
          <tr> 
           <td class="plc"> <span id="fastpostreturn"></span> 
            <div class="cl"> 
             <div id="fastposteditor"> 
              <div class="tedt mtn"> 
               <div class="bar"> 
                <span class="y"> <a href="forum.php?mod=post&amp;action=reply&amp;fid=2&amp;tid=10" onclick="return switchAdvanceMode(this.href)">高级模式</a> </span>
                <script src="/home/js/seditor.js" type="text/javascript"></script> 
                <div class="fpd"> 
                 <a href="javascript:;" title="文字加粗" class="fbld">B</a> 
                 <a href="javascript:;" title="设置文字颜色" class="fclr" id="fastpostforecolor">Color</a> 
                 <a id="fastpostimg" href="javascript:;" title="图片" class="fmg">Image</a> 
                 <a id="fastposturl" href="javascript:;" title="添加链接" class="flnk">Link</a> 
                 <a id="fastpostquote" href="javascript:;" title="引用" class="fqt">Quote</a> 
                 <a id="fastpostcode" href="javascript:;" title="代码" class="fcd">Code</a> 
                 <a href="javascript:;" class="fsml" id="fastpostsml">Smilies</a> 
                </div>
               </div> 
               <div class="area"> 
                <div class="pt hm">
                  您需要登录后才可以回帖 
                 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a> | 
                 <a href="member.php?mod=register" class="xi2">立即注册</a> 
                </div> 
               </div> 
              </div> 
             </div> 
            </div> <input type="hidden" name="formhash" value="eaea2ab4" /> <input type="hidden" name="usesig" value="" /> <input type="hidden" name="subject" value="  " /> 
            <div class="pnpost cl" style="padding-top: 10px;"> 
             <button type="button" onclick="showWindow('login', 'member.php?mod=logging&amp;action=login&amp;guestmessage=yes')" onmouseover="checkpostrule('seccheck_fastpost', 'ac=reply');this.onmouseover=null" name="replysubmit" id="fastpostsubmit" class="pn pnc vm" value="replysubmit" tabindex="5" style="float: right; padding: 0; height: 40px; line-height: 40px;"><strong style="padding: 0 25px; font-size: 16px; font-weight: 400;">提交评论</strong></button> 
             <em style="float: right; margin: 2px 0 0 0;"> </em> 
            </div> </td> 
          </tr> 
         </tbody>
        </table> 
       </form> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="wp mtn"> 
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--> 
   </div> 
   <script type="text/javascript">
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod_'+values['fuid']);
if(values['type'] == 'add') {
fObj.innerHTML = '不收听';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听TA';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=eaea2ab4&fuid='+values['fuid'];
}
}
fixed_avatar([10], 1);
</script>
  </div> 
 @endsection