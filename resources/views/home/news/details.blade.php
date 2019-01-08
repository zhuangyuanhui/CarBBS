@extends('home.layout.index')
@section('content')
  <div id="wp" class="wp time_wp cl">
   <link rel="stylesheet" type="text/css" href="/home/css/list.css" /> 
   <script src="/home/js/jquery.superslide.js" type="text/javascript"></script> 
   <script src="/home/js/forum_viewthread.js" type="text/javascript"></script> 
   <script type="text/javascript">zoomstatus = parseInt(1), imagemaxwidth = '720', aimgcount = new Array();</script> 
   <script src="/home/js/home.js" type="text/javascript"></script> 
   <style id="diy_style" type="text/css"></style> 
   <div class="wp"> 
    <!--[diy=diy1]-->
    <div id="diy1" class="area"></div>
    <!--[/diy]--> 
   </div> 
   <div id="ct" class="ct2 wp inside_box cl" style="margin-top: 20px;"> 
    <div class="mn" style="padding: 0; margin: 0; box-shadow: none; background: none;"> 
     <div class="Framebox cl" style="padding: 0 0 10px 0;"> 
      <div class="middle_info cl"> 
       <div class="bm vw" style="background: none;"> 
        <div class="infos"> 
         <a href="javascript:void(0)" class="recommend bds_more bdsharebuttonbox" data-cmd="more"> </a> 
         <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script> 
        </div> 
        <script type="text/javascript">

(function() {

    jQuery(window).scroll(function() {

        if (jQuery(window).scrollTop() > 100) {

            jQuery('.infos').fadeIn();

        } else if (jQuery(window).scrollTop() < 100) {

            jQuery('.infos').fadeOut();

        }

    });

    jQuery(".infos").hover(function() {

        jQuery(this).addClass("hover");

    },

    function() {

        jQuery(this).removeClass("hover");

    })



})();





</script> 
        <div id="pt" class="bm cl" style="padding: 20px 20px 0 20px; margin: 0;"> 
         <div class="z">
          <a>当前位置：</a>
          <a href="/home/index">首页</a> 
          <em>›</em> 
          <a href="/home/news/index/0">新闻</a>
          <em>›</em> 
          <a href="javascript:;">{{$cate->cname}}</a>
         </div> 
        </div> 
        <div class="h hm cl"> 
         <div class="cl"> 
          <h1 class="ph">{{ $new->title }} </h1> 
         </div> 
         <div class="cl" style="padding: 0 0 10px 0; border-bottom: 1px solid #f4f4f6;"> 
          <div class="avatar_left cl">
           <a href="home.php?mod=space&amp;uid=" c="[authorid]"><img src="/home/picture/avatar.php" /></a>
          </div> 
          <div class="avatar_right cl"> 
           <div class="cl" style="float: left; width: 380px; overflow: hidden;"> 
            <p class="authors" style="margin: 0 0 5px 0;"> <a href="space-uid-1.html">admin</a> <span class="time">{{ $new->created_at }}</span> </p> 
           </div> 
           <div class="cl" style="float: right; width: 260px; margin: 5px 0 0 0; overflow: hidden;"> 
            <div style="width: 260px; text-align: right;" class="focus_num cl">
             <a>256</a>
            </div> 
           </div> 
          </div> 
         </div> 
        </div> 
        <div class="blockquote" style="display: none;">
         <p>随着中国汽车市场的日益发展，居民购车年龄日趋年轻化，80后90后日渐成为购车的主题，他们的需求日益多样化，运动化，所以现在很多品牌定位都在向年轻 化靠拢，例如雷克萨斯、本田、大众、日产等等。他们的换代车型 ...</p>
        </div> 
        <div class="content_middle cl" style="padding: 0 20px;"> 
         <!--[diy=diysummarytop]-->
         <div id="diysummarytop" class="area"></div>
         <!--[/diy]--> 
         <!--[diy=diysummarybottom]-->
         <div id="diysummarybottom" class="area"></div>
         <!--[/diy]--> 
         <div class="d"> 
          <!--[diy=diycontenttop]-->
          <div id="diycontenttop" class="area"></div>
          <!--[/diy]--> 
          <table cellpadding="0" cellspacing="0" class="vwtb"> 
           <tbody>
            <tr> 
             <td id="article_content"> {!! $new->content !!}<br /><br /><p><a href="data/attachment/portal/201704/01/131328kt6626ki6m62kztz.jpg" target="_blank"><img src="/home/picture/131328kt6626ki6m62kztz.jpg" /></a></p> </td> 
            </tr> 
           </tbody>
          </table> 
          <div class="o cl ptm pbm" style="display: none;"> 
           <a href="misc.php?mod=invite&amp;action=article&amp;id=17" id="a_invite" onclick="showWindow('invite', this.href, 'get', 0);" class="oshr oivt" style=" display:none;">邀请</a> 
          </div> 
          <!--[diy=diycontentbottom]-->
          <div id="diycontentbottom" class="area"></div>
          <!--[/diy]--> 
          <!--[diy=diycontentclickbottom]-->
          <div id="diycontentclickbottom" class="area"></div>
          <!--[/diy]--> 
         </div> 
         <div id="click_div" class="mbm"> 
          <table cellpadding="0" cellspacing="0" class="atd"> 
           <tbody>
            <tr>
             <td> <a href="home.php?mod=spacecp&amp;ac=click&amp;op=add&amp;clickid=1&amp;idtype=aid&amp;id=17&amp;hash=f3fb10adf98799def4c26640ab56cd49&amp;handlekey=clickhandle" id="click_aid_17_1" onclick="showWindow(this.id, this.href);doane(event);"> <img src="/home/picture/zan.png" alt="" /><br /> </a> </td> 
            </tr> 
           </tbody>
          </table> 
          <script type="text/javascript">

function errorhandle_clickhandle(message, values) {

if(values['id']) {

showCreditPrompt();

show_click(values['idtype'], values['id'], values['clickid']);

}

}

</script> 
         </div> 
         <div class="viewthread_foot cl"> 
          <div class="bdsharebuttonbox cl" style="padding: 0 5px 20px 0;"> 
           <em style="padding: 0; background: none; color: #999999;">分享至 :</em> 
           <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a> 
           <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a> 
           <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a> 
           <a href="#" class="bds_more" data-cmd="more"></a>
          </div> 
          <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script> 
          <span class="cutline" style="margin: 9px 10px 0 0;"></span> 
          <a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=article&amp;id=17&amp;handlekey=favoritearticlehk_17" id="a_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" class="k_favorite">收藏</a> 
         </div> 
         <!--[diy=diycontentrelatetop]-->
         <div id="diycontentrelatetop" class="area"></div>
         <!--[/diy]-->  
         <div class="contacts cl"> 
         </div> 
        </div> 
        <!--[diy=diycontentrelate]-->
        <div id="diycontentrelate" class="area"></div>
        <!--[/diy]--> 
       </div> 
      </div> 
      <div id="comment" class="bm cl"> 
       <div class="comment_tit cl"> 
        <div class="z"> 
         <a>评论</a> 
        </div> 
        <div class="y"> 
         <a>1条</a> 
        </div> 
       </div> 
       <div class="comment_box cl"> 
        <form id="cform" name="cform" action="portal.php?mod=portalcp&amp;ac=comment" method="post" autocomplete="off"> 
         <div class="tedt" id="tedt"> 
          <div class="area">
           <div style="text-align: center; height: 80px; padding: 30px 0;">
            <p style="margin-top: 15px; color: #333333; font-size: 14px;">请<a href="member.php?mod=logging&amp;action=login" style="color: #4ecdc4;">登录</a>后才可以发表评论，或<a href="member.php?mod=register" style="color: #4ecdc4;">免费注册</a></p>
           </div> 
          </div> 
         </div> 
        </form> 
       </div> 
       <script type="text/javascript">

    jQuery(function(){

jQuery("#tedt .pt").focus(function(){

  jQuery(this).addClass("bgchange");

}).blur(function(){

  jQuery(this).removeClass("bgchange");

});

    });

    </script> 
       <div id="comment_ul"> 
        <ul> 
         <li> <a name="comment_anchor_10"></a> 
          <dl id="comment_10_li" class="ptm pbm cl"> 
           <dt class="top_in cl" style="position: relative; line-height: 20px; margin: 0 0 13px 0; color: #BBBBBB;"> 
            <div class="portrait"> 
             <a href="space-uid-1.html" c="1"><img src="/home/picture/avatar.php" /></a> 
            </div> 
            <span class="z"> <a href="space-uid-1.html" class="username">admin</a> </span> 
            <span class="cutline"></span> 
            <span class="z">2016-5-6 11:43</span> 
            <span class="y" style="padding: 0 0 0 10px;"> </span> 
           </dt> 
           <dd>
            现在很多品牌定位都在向年轻 化靠拢，例如雷克萨斯、本田、大众、日产等等......
           </dd> 
           <dd class="cl" style="padding-top: 18px;">
            <div class="reply1 y" style="height: 17px; line-height: 17px;">
             <a href="javascript:;" onclick="portal_comment_requote(10, '17');" style="color: #BBBBBB; font-size: 14px;"><span class="s_reply"></span>回复</a>
            </div> 
           </dd> 
          </dl> </li> 
        </ul> 
       </div> 
      </div> 
      <!--[diy=diycontentcomment]-->
      <div id="diycontentcomment" class="area"></div>
      <!--[/diy]--> 
     </div> 
    </div> 
    <div class="sd pph" style="width: 310px; padding: 0; box-shadow: none; background: none;"> 
     <!--[diy=diy6]-->
     <div id="diy6" class="area">
      <div id="frameW1VQ5V" class="frame move-span cl frame-1">
       <div id="frameW1VQ5V_left" class="column frame-1-c">
        <div id="frameW1VQ5V_left_temp" class="move-span temp"></div>
        <div id="portal_block_276" class="block move-span">
         <div id="portal_block_276_content" class="dxb_bc">
          <div class="box s_timeline"> 
           <h3 class="modname">推荐阅读</h3> 
           <div class="s_text_list"> 
            <div class="nano has-scrollbar"> 
             <ul style="right: -17px;" tabindex="0" class="nano-content">
              @foreach($cate_new as $k => $v)
              <li><i><span></span></i><a href="/home/news/{{$v->id}}/details" target="_blank">{{ $v->title }}</a><p></p></li>
              @endforeach
             </ul> 
            </div> 
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div id="tabwcgcIo" class="tab2 frame-tab move-span cl">
       <div id="tabwcgcIo_title" class="tab-title title column cl" switchtype="mouseover">
        <div id="portal_block_277" class="block move-span">
         <div class="blocktitle title">
          <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">便民服务</span>
         </div>
         <div id="portal_block_277_content" class="dxb_bc">
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
        <div id="portal_block_279" class="block move-span">
         <div class="blocktitle title">
          <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">关注我们</span>
         </div>
         <div id="portal_block_279_content" class="dxb_bc">
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
       </div>
       <div id="tabwcgcIo_content" class="tb-c"></div>
       <script type="text/javascript">initTab("tabwcgcIo","mouseover");</script>
      </div>
     </div>
     <!--[/diy]--> 
     <div id="recommendArticle"> 
      <!--[diy=diy7]-->
      <div id="diy7" class="area"></div>
      <!--[/diy]--> 
     </div> 
    </div> 
   </div> 
   <div class="wp mtn"> 
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--> 
   </div> 
   <input type="hidden" id="portalview" value="1" /> 
   <script type="text/javascript"> 

jQuery(function() {

jQuery("span").click(function() {

var thisEle = jQuery("#article_content").css("font-size");

var textFontSize = parseFloat(thisEle, 10);

var unit = thisEle.slice( - 2);

var cName = jQuery(this).attr("class");

if (cName == "bigger") {

if (textFontSize <= 22) {

textFontSize += 2;

}

} else if (cName == "smaller") {

if (textFontSize >= 12) {

textFontSize -= 2;

}

}

jQuery("#article_content").css("font-size", textFontSize + unit);

});

});

</script> 
  </div> 
  @endsection