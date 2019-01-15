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
       <em>&raquo;</em>
     <a href="/home/index">首页</a>
     <em></em>
     <a href="/home/articles">文章</a> 
     <em>›</em> 
     <a href="javascript:;">{{$cates->cname}}</a> 
     <em>›</em> 
     <a href="javascript:;">查看内容</a> 
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
       <a href="/home/articles/create" class="bluebigbutton"  title="发新帖">发新帖</a> 
       <a href="javascript:;" id="sign" class="greenbigbutton" title="签到" style="margin-right: 0;">签到SIGN</a> 
      </div> 
      <script type="text/javascript">
        $('#sign').click(function(){
          $.get('/home/users/sign',{},function(data){
            if(data.msg == 'success'){
              alert('签到成功,积分加'+data.jifen);
            } else {
              alert('今天已签到');
            }
          },'json');
        });
      </script>
      <div class="quater_author_info cl"> 
       <div class="quater_author_info_1 cl"> 
        <a href="/home/personal/index/{{ $user->id }}" target="_blank" class="toux"><img src="/uploads/{{ $user->getUserInfo->face }}" /></a> 
        <p><a href="/home/personal/index/{{ $user->id }}" target="_blank">{{ $user->uname }}</a> </p> 
        <p style="margin-top: 3px;">
          <a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=1" target="_blank" style="color: #FF0000;">
             @if($user->id == 1)
               管理员
             @else
               用户
             @endif
           </a>
         </p> 
        <div class="time_thread_stat cl"> 
         <ul> 
          <li><a>{{ $user->getUserInfo->sign_number }}</a><p>积分</p></li> 
          <li><a>{{ $art_count }}</a><p>帖子</p></li> 
          <li style="border-right: 0;"><a>3</a><p>精华</p></li> 
         </ul> 
        </div> 
       </div> 
       <div class="quater_author_info_3 cl" style="background: #F9F9F9;"> 
        <div class="s_timeline s_timeline2 cl" style="margin: 0 20px 20px 20px;"> 
         <ul style="border-top: 0;"> 
          @foreach($click as $k => $v)
          <li><i><span></span></i><a href="/home/articles/{{$v->id}}/edit" target="_blank">{{ $v->title }}</a><p></p></li> 
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
             <p><a href="javascript:;" class=""></a>&copy; <a href="javascript:;" target="_blank">admin</a> <a>管理员</a> &nbsp;&nbsp;/&nbsp;&nbsp;2015-9-6 13:07&nbsp;&nbsp;/&nbsp;&nbsp;<span> <a href="javascript:;" id="k_favorite"  onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖" class="k_favorite" style="padding-right: 10px;"><i></i>{{ $num }} 人收藏</a> <a href="javascript:void(0)" class="cc1" title="保留作者信息" style="margin-left: 10px;">保留作者信息</a> <a href="javascript:void(0)" class="cc2" title="禁止商业使用（站长自定义文字）">禁止商业使用（站长自定义文字）</a></span></p>
             <a href="javascript:;">
              <span  onclick="report(this)"style="margin-left: 670px;margin-top: -10px;">举报</span>
              <span style="display: none;">{{ $article->id }}</span> 
              <span style="display: none;">{{ $login_users->id }}</span> 
            </a>
            </div> 
           </div> 
          </div> 
         </div> 
        </div> 
       </div>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
        <!-- 文章举报 -->
       <script type="text/javascript">
         report = function(obj){
           var article_id = $(obj).next().html();
           $('#article_id').attr('value',article_id);

           var users_id   = $(obj).next().next().html();
           $('#users_id').attr('value',users_id);

           $('#myModal').modal('show');
         }
       </script>
       <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">文章举报</h4>
          </div>
          <div class="modal-body">
            <form action="/home/articles/report" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="article_id" id="article_id">
              <input type="hidden" name="users_id" id="users_id">
            <div class="form-group">
              <label for="exampleInputEmail1">举报类型</label>
              <select class="form-control" name="type">
                <option value="1"> 其他 </option>
                <option value="2">低俗色情</option>
                <option value="3">政治敏感</option>
                <option value="4">内容重复</option>
                <option value="5">攻击歧视</option>
                <option value="6">血腥暴力</option>
              </select>
            </div>
             <div class="form-group">
              <label for="disabledTextInput">举报原因</label>
              <input type="textarea" style="width:569px;height: 100px; " name="content" id="disabledTextInput" class="form-control" placeholder="举报原因">
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              <button type="submit" class="btn btn-primary">举报</button>
            </div>
           </form>
        </div>
      </div>
    </div>
    <!-- 结束 -->
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
               </div> 
               <div id="comment_10" class="cm"> 
               </div> 
               <div id="post_rate_div_10"></div> 
              </div> 
             </div>  </td>
           </tr> 
           <tr>
            <td class="plc plm"> 
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
               <!-- 文章收藏 -->
               <a href="javascript:;" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title ={{ $num }} + ' 人收藏'" title="收藏本帖" class="k_favorite">
                 @if($flag ==1 )
                 <span id="collect">已收藏</span><li style="display: none;">{{ $article->id }}</li>
                 @elseif($flag == 2)
                 <span id="collect">收藏</span><li style="display: none;">{{ $article->id }}</li>
                 @elseif($flag == 3)
                 <a href="/home/login/login"><span>收藏</span></a>
                 @endif
               </a>
               <!-- 文章收藏js代码 -->
              <script type="text/javascript">
                 jQuery('#collect').click(function(){
                  var id = $(this).next().html();
                  jQuery.get('/home/articles/collect/'+id,{'id':id},function(data){
                    if(data.type == 'quxiao'){
                          if(data.code == 'success'){
                                $('#collect').html('收藏');
                          }else{
                              alert('取消收藏失败');
                          }
                    } else if(data.type == 'shoucang'){
                          if(data.code == 'success'){
                                $('#collect').html('已收藏');
                          }else{
                              alert('收藏失败');
                          }
                    }
                  },'json');
                 });
               </script>
               <!-- 文章点赞点踩 -->
               <!-- type = 1用户登录并且已点赞 -->
               @if($praise_trample==1)
                   <a href="javascript:;" style="margin-left: 340px;" onmouseover="this.title ={{ $article->praise }} + ' 人点赞'" title="收藏本帖">
                      <span onclick="tags(this)" ><img src="/home/picture/praised.png" style="width: 28px;height: 28px;"></span>
                      <span style="display: none;">{{ $article->id }}</span>
                   </a>
                   <a href="javascript:;" style="margin-left: 10px;"  onmouseover="this.title ={{ $article->trample }} + ' 人点踩'" title="收藏本帖">
                    <span><img src="/home/picture/trample.png" style="width: 28px;height: 28px;"></span>
                    <span style="display: none;">{{ $article->id }}</span>
                   </a>
              <!-- type = 2用户登录并且已点踩 -->
               @elseif($praise_trample==2)
                   <a href="javascript:;" style="margin-left: 340px;" onmouseover="this.title ={{ $article->praise }} + ' 人点赞'" title="收藏本帖">
                      <span><img src="/home/picture/praise.png" style="width: 28px;height: 28px;"></span>
                      <span style="display: none;">{{ $article->id }}</span>
                   </a>
                   <a href="javascript:;" style="margin-left: 10px;"  onmouseover="this.title ={{ $article->trample }} + ' 人点踩'" title="收藏本帖">
                    <span onclick="trample(this)" ><img src="/home/picture/trampled.png" style="width: 28px;height: 28px;"></span>
                    <span style="display: none;">{{ $article->id }}</span>
                   </a>
              <!-- type = 3用户登录并未点赞未点踩 -->
               @elseif($praise_trample==3)
                   <a href="javascript:;" style="margin-left: 340px;" onmouseover="this.title ={{ $article->praise }} + ' 人点赞'" title="收藏本帖">
                      <span onclick="tags(this)" ><img src="/home/picture/praise.png" style="width: 28px;height: 28px;"></span>
                      <span  style="display: none;">{{ $article->id }}</span>
                   </a>
                   <a href="javascript:;" style="margin-left: 10px;"  onmouseover="this.title ={{ $article->trample }} + ' 人点踩'" title="收藏本帖">
                    <span onclick="trample(this)"><img src="/home/picture/trample.png" style="width: 28px;height: 28px;"></span>
                    <span style="display: none;">{{ $article->id }}</span>
                   </a>
                @elseif($praise_trample==4)
                   <a onclick="return confirm('请先登录')" href="/home/login/login" style="margin-left: 340px;" onmouseover="this.title ={{ $article->praise }} + ' 人点赞'" title="收藏本帖">
                      <span><img src="/home/picture/praise.png" style="width: 28px;height: 28px;"></span>
                   </a>
                   <a onclick="return confirm('请先登录')" href="/home/login/login" style="margin-left: 10px;"  onmouseover="this.title ={{ $article->trample }} + ' 人点踩'" title="收藏本帖">
                    <span><img src="/home/picture/trample.png" style="width: 28px;height: 28px;"></span>
                   </a>
               @endif
                

               <script type="text/javascript">
                 tags = function(obj){
                  var article_id = $(obj).next().html();
                  var url = '/home/articles/tags/'+article_id;
                  $.get(url,{},function(data){
                    if(data.type == 'untags'){
                      if(data.code == 'success'){
                         $(obj).children(1).attr('src','/home/picture/praise.png');
                         $(obj).parent().next().children().attr('onclick','trample(this)');
                      }1
                    } else {
                      if(data.code == 'success'){
                         $(obj).children(1).attr('src','/home/picture/praised.png');
                         $(obj).parent().next().children().attr('onclick','');
                      }
                    }
                   
                  },'json');
                 }

                 function trample(obj){
                   var article_id = $(obj).next().html();
                   var url = '/home/articles/trample/'+article_id;
                   $.get(url,{},function(data){
                    if(data.type=='untrample'){
                      if(data.code == 'success'){
                        $(obj).children(1).attr('src','/home/picture/trample.png');
                        $(obj).parent().prev().children().attr('onclick','tags(this)');
                      }
                    } else {
                      if(data.code == 'success'){
                         $(obj).children(1).attr('src','/home/picture/trampled.png');
                         $(obj).parent().prev().children().attr('onclick','');
                      }
                    }
                   },'json');
                 }
               </script>

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
        @foreach($labels as $k => $v)
          <a title="{{ $v }}" href="javascript:;" target="_blank">{{ $v }}</a>
        @endforeach
       </div> 
       <div id="postlist" class="pl bm postlist_reply"> 
        <div class="reply_tit cl"> 
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
              @foreach($cate as $k => $v)
             <dl class="news-l-dl "> 
              <dt>
               <a href="/home/articles/{{$v->id}}/edit" title="{{ $v->title }}"> <img style="display: inline;" src="/uploads/{{ $v->cover }}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $v->title }}" title="{{ $v->title }}" width="220" height="120" /> </a> 
              </dt> 
              <dd>
               <a href="/home/articles/{{$v->id}}/edit" title="{{ $v->title }}">{{ $v->title }}</a> 
              </dd> 
             </dl>
             @endforeach
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
        <table cellspacing="0" cellpadding="0"> 
         <tbody>
          <tr> 
           <td class="plc"> <span id="fastpostreturn"></span> 
            <div class="cl"> 
             <div id="fastposteditor">
 <!-- 评论填写框 -->
             <div class="comment_box cl"> 
              <form id="cform" name="cform" action="javascript:;" method="post" autocomplete="off">
                {{csrf_field()}}
               <div id="tedt"> 
                <div class="area">
                  <input type="hidden" name="article_id" value="{{$article->id}}">
                  <textarea @if(isset($user)) @else disabled="disabled" @endif style=" width: 710px; height: 150px; padding: 30px 0;" id="newscontent" name="art_comment_content">
                    @if(isset($user))

                  @else
                   请登录才可以发表评论, 或者免费注册
                  @endif
                  </textarea>
                  <p></p>
                  <button type="submit"  name="commentsubmit_btn" id="commentsubmit_btn" value="true" class="pn y">发表评论</button>
                  <style type="text/css" >
                    .pn{
                      float: right;
                      font-family: "Microsoft Yahei";
                      height: 40px;
                      line-height: 40px;
                      width: 114px;
                      margin: 0;
                      color: #FFFFFF;
                      font-size: 16px;
                      font-weight: 400;
                      border: 0;
                      border-radius: 0;
                      overflow: hidden;
                      box-shadow: none;
                      background-color: #f2953b !important;
                      border-bottom: 3px solid #da8635;
                    }
                  </style>
                </div> 
               </div> 
              </form> 
             </div>
             <!-- 评论填写框结束 -->
            <!-- 回复填写框开始 -->
            <div id="fwin_reply" class="fwinmask" style="position: fixed; z-index: 201; left: 595px; top: 323.5px;width: 422px;height: 200px;display: none">
              <table cellpadding="0" cellspacing="0" class="fwin" style="width: 422px;height: 200px;">
                <tbody style="width: 422px;height: 200px;">
                  <tr>
                    <td class="m_l" >&nbsp;&nbsp;</td>
                    <td class="m_c " id="fwin_content_reply " fwin="reply " style=" ">
                      <h3 class="flb " id="fctrl_reply " style="cursor: move; ">
                        <em id="return_reply " fwin="reply ">参与/回复主题</em>
                        <span>
                          <a href="javascript:; " class="flbc " title="关闭 ">关闭</a>
                        </span>
                      </h3>
                      <br>
                    <form method="post " autocomplete="off " id="postform ">
                      {{ csrf_field() }}
                      <div class="c " id="floatlayout_reply " fwin="reply ">
                        <div class="p_c ">
                          <div class="tedt" style="width: 400px;height: 80px;">
                            <textarea style="width: 400px;height: 80px;" id="huifu_content">
                              @if(isset($user))

                              @else
                                  请登录才可以发表回复
                              @endif
                            </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="o pns " id="moreconf " fwin="reply ">
                        <a style="width: 80px;height: 35px;" onclick="postsubmit(this)" id="postsubmit " class="pn pnc z "  name="replysubmit " href="javascript:;">回复</a>
                      </div>
                    </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- 回复填写框结束 -->
             <div id="comment" class="bm cl commentcomment" >

              <!-- 文章详情评论回复克隆模板开始 -->
              <div>
                 <div id="comment_ul" class="comment_ul" style="display: none;height: 140px"> 
                  <ul style="height: 140px"> 
                   <li style="height: 140px"> <a name="comment_anchor_10"></a> 
                    <dl id="comment_10_li" class="ptm pbm cl"> 
                     <dt class="top_in cl" style="position: relative; line-height: 20px; margin: 0 0 13px 0; color: #BBBBBB;"> 
                      <div class="portrait"> 
                       <a href="/home/personal/index/" c="1"><img src="/home/picture/avatar.php" style="width: 50px;height: 50px;border-radius: 25px;" /></a> 
                      </div> 
                      <span class="z "> <a href="space-uid-1.html" class="username">admin</a> </span> 
                      <span class="cutline"></span> 
                      <span class="z shijian">2016-5-6 11:43</span> 
                      <span class="y" style="padding: 0 0 0 10px;"> </span> 
                     </dt> 
                     <dd class="pinglun">
                      现在很多品牌定位都在向年轻 化靠拢，例如雷克萨斯、本田、大众、日产等等......
                     </dd> 
                     <dd class="cl" style="padding-top: 18px;">
                        <div class="reply1 y" style="height: 17px; line-height: 17px;">
                         <a href="javascript:;"  style="color: #BBBBBB; font-size: 14px;" onclick="deletecomment(this)">
                           删除</a>
                          </div>
                     </dd> 
                    </dl> </li> 
                  </ul> 
                 </div> 
               </div>
               <!-- 文章详情评论回复克隆模板结束 -->
 
             </div> 
            </div> <input type="hidden" name="formhash" value="eaea2ab4" /> <input type="hidden" name="usesig" value="" /> <input type="hidden" name="subject" value="  " /> 
            <div class="pnpost cl" style="padding-top: 10px;> 
             <em style="float: right; margin: 2px 0 0 0;"> </em> 

             
            </div> 
                   @foreach($art_comment as $key=>$value)
                       <div id="comment_ul" class="comment_ul" style="height: 140px" > 
                        <ul style="height: 140px"> 
                         <li style="height: 140px"> <a name="comment_anchor_10"></a> 
                          <dl id="comment_10_li" class="ptm pbm cl"> 
                           <dt class="top_in cl" style="position: relative; line-height: 20px; margin: 0 0 13px 0; color: #BBBBBB;"> 
                            <div class="portrait"> 
                             <a href="/home/personal/index/{{$value->from_uid}}" c="1"><img src="/uploads/{{$value->usersinfo->face}}" style="width: 50px;height: 50px;border-radius: 25px;" /></a> 
                            </div> 
                            <span class="z "> <a href="/home/personal/index/{{$value->from_uid}}" class="username">{{$value->users->uname}}</a> </span> 
                            <span class="cutline"></span> 
                            <span class="z shijian">{{date('Y-m-d H:i:s',$value->ctime)}}</span>
                            <span class="y" style="padding: 0 0 0 10px;"> </span> 
                           </dt> 
                           <dd class="pinglun">
                           {{$value->content}}
                           </dd> 
                           <dd class="cl" style="padding-top: 18px;">
                            <div class="reply1 y" style="height: 17px; line-height: 17px;">
                              @if($value->users->id == $login_users->id)
                               <a href="javascript:;"  style="color: #BBBBBB; font-size: 14px;" onclick="deletecomment(this)">
                                 删除</a>
                              @else
                             <a href="javascript:;"  style="color: #BBBBBB; font-size: 14px;" onclick="replyshow(this)">
                              <span class="s_reply"></span>回复</a>
                              @endif
                              <input type="hidden" name="pid" class="pid" value="{{$value->id}}">
                              <input type="hidden" name="new_id" value="{{$article->id}}">
                            </div> 
                           </dd> 
                          </dl> </li> 
                        </ul> 
                       </div> 
                      @foreach($value->sub as $kk=>$vv)
                            <div  id="rely_content_ul">
                             <div id="comment_ul" class="comment_ul" style="height: 100px"> 
                              <ul style="height: 100px"> 
                               <li style="margin-left: 70px;height: 100px"> <a name="comment_anchor_10"></a> 
                                  <dl id="comment_10_li" class="ptm pbm cl"> 
                                   <dt class="top_in cl" style="position: relative; line-height: 20px; margin: 0 0 13px 0; color: #BBBBBB;"> 
                                    <div class="portrait"> 
                                     <a href="/home/personal/index/{{$vv->from_uid}}" c="1"><img src="/uploads/{{$vv->usersinfo->face}}" style="width: 35px;height: 35px;border-radius: 17px;" /></a> 
                                    </div> 
                                    <span class="z "> <a href="/home/personal/index/{{$vv->from_uid}}" class="username">{{$vv->users->uname}}</a> </span> 
                                    <span class="cutline"></span> 
                                    <span class="z shijian">{{date('Y-m-d H:i:s',$vv->ctime)}}</span>
                                    <span class="y" style="padding: 0 0 0 10px;"> </span> 
                                   </dt> 
                                   <dd class="pinglun">
                                   {{$vv->content}}
                                   </dd>
                                   <dd class="cl reply88" style="padding-top: -100px;">
                                        <div class="reply1 y" style="height: 10px; line-height: 10px;">
                                          @if($vv->users->id == $login_users->id)
                                           <a href="javascript:;" class="reply66"  style="color: #BBBBBB; font-size: 10px;" onclick="deletecomment(this)">
                                             删除</a>
                                          @endif
                                          <input type="hidden" name="pid" class="pid" value="{{$vv->id}}">
                                        </div> 
                                       </dd> 
                                  </dl>
                                </li> 
                              </ul> 
                             </div> 
                           </div>
                      @endforeach
              @endforeach
            </div>
              <script type="text/javascript">
                          $(function(){
                              //发送文章评论的ajax
                              $('#commentsubmit_btn').click(function(){
                                 var art_comment = $('#newscontent').val();
                                     art_comment = art_comment.trim();
                                  if(art_comment){
                                       $.ajax({
                                        url:'/home/articles/art_comment',
                                        type:'post',
                                        data:new FormData($('#cform')[0]), //创建表单数据
                                        processData:false, //不限定格式
                                        contentType:false, //不进行特定格式编码
                                        dataType:'json',
                                        success:function(data){
                                          if(data.code == 'success'){
                                          //克隆一个评论div
                                          var comment = $('#comment_ul').eq(0).clone(true);
                                          comment.find('.username').html(data.user.uname);
                                          var face = '/uploads/'+data.user_info.face;
                                          var href = '/home/personal/index/' + data.user.id;
                                          comment.find('.portrait img').attr('src',face);
                                          comment.find('.portrait a').attr('href',href);
                                          comment.find('.username').attr('href',href);
                                          comment.find('.pinglun').html(data.comment.content);
                                          comment.find('.shijian').html(data.comment.created_at);
                                          //追加
                                          $('.commentcomment').prepend(comment);
                                          comment.css('display','block');
                                          $('#newscontent').val('');

                                        }else{  
                                           alert('评论失败');
                                        }
                                      }
                                    });
                                }
                                     
                                });
                              //给评论回复按钮绑定事件
                              replyshow = function(obj){

                                //获取父级id和新闻id
                                pid = $(obj).next().val();
                                article_id = $(obj).next().next().val();
                                //显示回复框
                                $('#fwin_reply').css('display','block');
                                      //给回复发表按钮绑定事件
                                      postsubmit = function(object){
                                        //接收并处理回复内容
                                        var str = $('#huifu_content').val();
                                         str = str.trim();
                                         //准备url地址
                                         var url = '/home/articles/art_comment';
                                        $.ajaxSetup({
                                                      headers: {
                                                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                      }
                                                  });
                                        
                                        $.post(url,{'pid':pid,'article_id':article_id,'art_comment_content':str},function(data){
                                              if(data.code == 'success'){
                                                 //关闭回复框
                                                   $('#fwin_reply').css('display','none');
                                                  //克隆一个评论div
                                                  var comment = $('#comment_ul').eq(0).clone(true);
                                                  //给克隆的回复框赋值并修改大小
                                                  comment.find('.username').html(data.user.uname);
                                                  var face = '/uploads/'+data.user_info.face;
                                                  var href = '/home/personal/index/' + data.user.id;
                                                  comment.find('.portrait img').attr('src',face);
                                                  comment.find('.portrait img').attr('style',"width: 35px;height: 35px");
                                                  comment.find('li').attr('style','margin-left: 70px;height: 100px');

                                                  comment.find('.reply1').attr('style','height: 10px; line-height: 10px;');
                                                  comment.find('.reply66').attr('style','color: #BBBBBB; font-size: 10px;');
                                                  comment.find('.reply88').attr('style','padding-top: -100px;');

                                                  comment.find('.reply66').attr('onclick','deletecomment(this)');
                                                  comment.find('.portrait a').attr('href',href);
                                                  comment.find('.username').attr('href',href);
                                                  comment.find('.pinglun').html(data.comment.content);
                                                  comment.find('.shijian').html(data.comment.created_at);
                                                  $('#huifu_content').val('');

                                                  //追加到响应位置
                                                  $(obj).parent().parent().parent().parent().parent().parent().after(comment);

                                                  comment.css('display','block');
                                                 
                                            }else{  
                                               alert('回复失败');
                                            }

                                        },'json')
                                         
                                        };
                              } 
                                
                                //关闭回复框功能
                                  $('.flbc').click(function(){
                                            $('#fwin_reply').css('display','none');
                                  })

                                  //删除评论回复功能
                                  deletecomment = function (obje){
                                      var id = $(obje).next().val();
                                      var url = '/home/articles/art_comment_delete/'+id;
                                      $.get(url,{'id':id},function(data){
                                        if(data.code == 'success'){
                                          $(obje).parent().parent().parent().parent().parent().parent().remove();
                                        }else{
                                          alert('删除失败');
                                        }
                                      },'json')
                                  } 
                        });
              </script>
          </td> 
          </tr> 
         </tbody>
        </table>
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