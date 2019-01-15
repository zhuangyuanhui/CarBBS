@extends('home.layout.index')
@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" /> 
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
             <a>{{$new->clicks}}</a>
            </div> 
           </div> 
          </div> 
         </div>  
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
             <td id="article_content"> {!! $new->content !!}<br /><br /><p><a href="data/attachment/portal/201704/01/131328kt6626ki6m62kztz.jpg" target="_blank"></a></p> </td> 
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
          <a href="javascript:;" id="a_favorite" class="k_favorite" onmouseover="this.title ={{$num}} + ' 人收藏'" title="收藏">
            <!-- 判断是否已收藏 -->
            @if($flag ==1 )
               <span id="collect">已收藏</span><li style="display: none;">{{ $new->id }}</li>
               @elseif($flag == 2)
               <span id="collect">收藏</span><li style="display: none;">{{ $new->id }}</li>
               @elseif($flag == 3)
               <a href="/home/login/login"><span>收藏</span></a>
               @endif
          </a>
          <!-- 判断是否已点赞 -->
          @if($ifpraise == 1)
          <span @if($iftrample == 2) onclick="praise(this)" class="praise" @endif onmouseover="this.title = {{$new->praise}} + '人点赞'" style="margin-left: 350px;"><img src="/home/picture/praised.png" style="width: 28px;height: 28px;"></span>
          @elseif($ifpraise == 2)
          <span @if($iftrample == 2) onclick="praise(this)" class="praise" @endif onmouseover="this.title = {{$new->praise}} + '人点赞'" style="margin-left: 350px;"><img src="/home/picture/praise.png" style="width: 28px;height: 28px;"></span>
          @elseif($ifpraise == 3)
          <a style="margin-left: 350px;" onclick="return confirm('请先登录');" href="/home/login/login"><span onmouseover="this.title = {{$new->praise}} + '人点赞'"><img src="/home/picture/praise.png" style="width: 28px;height: 28px;"></span></a>
          @endif
          <!-- 判断是否已点踩 -->
          @if($iftrample == 1)
          <span @if($ifpraise == 2) onclick="trample(this)" class="trample" @endif onmouseover="this.title = {{$new->trample}} + '人点踩'"  style="margin-left: 20px;"><img src="/home/picture/trampled.png" style="width: 28px;height: 28px;"></span>
          @elseif($iftrample == 2)
          <span @if($ifpraise == 2) onclick="trample(this)" class="trample" @endif onmouseover="this.title = {{$new->trample}} + '人点踩'" style="margin-left: 20px;"><img src="/home/picture/trample.png" style="width: 28px;height: 28px;"></span>
          @elseif($iftrample == 3)
          <a style="margin-left: 20px;" onclick="return confirm('请先登录')" href="/home/login/login"><span onmouseover="this.title = {{$new->trample}} + '人点踩'"><img src="/home/picture/trample.png" style="width: 28px;height: 28px;"></span></a>
          @endif
          
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
       <!-- 评论填写框 -->
             <div class="comment_box cl"> 
              <form id="cform" name="cform" action="javascript:;" method="post" autocomplete="off">
                {{csrf_field()}}
               <div id="tedt"> 
                <div class="area">
                  <input type="hidden" name="new_id" value="{{$new->id}}">
                  <textarea @if(isset($users)) @else disabled="disabled" @endif style=" width: 710px; height: 150px; padding: 30px 0;" id="newscontent" name="content">
                    @if(isset($users))

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
                              @if(isset($users))

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
               <!-- 新闻详情评论回复克隆模板开始 -->
              <div>
                 <div id="comment_ul" class="comment_ul" style="display: none;height: 140px"> 
                  <ul style="height: 140px"> 
                   <li style="height: 140px"> <a name="comment_anchor_10"></a> 
                    <dl id="comment_10_li" class="ptm pbm cl"> 
                     <dt class="top_in cl" style="position: relative; line-height: 20px; margin: 0 0 13px 0; color: #BBBBBB;"> 
                      <div class="portrait"> 
                       <a href="/home/personal/index/" c="1"><img src="/home/picture/avatar.php" /></a> 
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
               <!-- 新闻详情评论回复克隆模板结束 -->
            @foreach($comment_new as $key=>$value)
              
                 <div id="comment_ul" class="comment_ul" style="height: 140px" > 
                  <ul style="height: 140px"> 
                   <li style="height: 140px"> <a name="comment_anchor_10"></a> 
                    <dl id="comment_10_li" class="ptm pbm cl"> 
                     <dt class="top_in cl" style="position: relative; line-height: 20px; margin: 0 0 13px 0; color: #BBBBBB;"> 
                      <div class="portrait"> 
                       <a href="/home/personal/index/{{$value->from_uid}}" c="1"><img src="/uploads/{{$value->usersinfo->face}}" /></a> 
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
                        @if(isset($users))
                        @if($value->users->id == $users->id)
                         <a href="javascript:;"  style="color: #BBBBBB; font-size: 14px;" onclick="deletecomment(this)">
                           删除</a>
                        @else
                       <a href="javascript:;"  style="color: #BBBBBB; font-size: 14px;" onclick="replyshow(this)">
                        <span class="s_reply"></span>回复</a>
                        @endif
                        @endif
                        <input type="hidden" name="pid" class="pid" value="{{$value->id}}">
                        <input type="hidden" name="new_id" value="{{$new->id}}">

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
                               <a href="/home/personal/index/{{$vv->from_uid}}" c="1"><img src="/uploads/{{$vv->usersinfo->face}}" style="width: 35px;height: 35px" /></a> 
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
                                  @if(isset($users))
                                    @if($vv->users->id == $users->id)
                                     <a href="javascript:;" class="reply66"  style="color: #BBBBBB; font-size: 10px;" onclick="deletecomment(this)">
                                       删除</a>
                                    @endif
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

              //发送新闻评论的ajax
              $('#commentsubmit_btn').click(function(){
                 var a = $('#newscontent').val();
                     a = a.trim();
                  if(a){
                       $.ajax({
                        url:'/home/news/news_comment',
                        type:'post',
                        data:new FormData($('#cform')[0]), //创建表单数据
                        processData:false, //不限定格式
                        contentType:false, //不进行特定格式编码
                        dataType:'json',
                        success:function(data){
                          if(data.code == 'success'){
                            //克隆一个评论div
                            var comment = $('#comment_ul').eq(0).clone(true);
                            comment.find('.username').html(data.users.uname);
                            var face = '/uploads/'+data.usersinfo.face;
                            var href = '/home/personal/index/' + data.users.id;
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
                new_id = $(obj).next().next().val();
                //显示回复框
                $('#fwin_reply').css('display','block');
                      //给回复发表按钮绑定事件
                      postsubmit = function(object){
                        //接收并处理回复内容
                        var str = $('#huifu_content').val();
                         str = str.trim();
                         //准备url地址
                         var url = '/home/news/news_reply';
                        $.ajaxSetup({
                                      headers: {
                                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                      }
                                  });
                        
                        $.post(url,{'pid':pid,'new_id':new_id,'content':str},function(data){
                              if(data.code == 'success'){
                                 //关闭回复框
                                   $('#fwin_reply').css('display','none');
                                  //克隆一个评论div
                                  var comment = $('#comment_ul').eq(0).clone(true);
                                  //给克隆的回复框赋值并修改大小
                                  comment.find('.username').html(data.users.uname);
                                  var face = '/uploads/'+data.usersinfo.face;
                                  var href = '/home/personal/index/' + data.users.id;
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
                deletecomment = function(obje){
                    var id = $(obje).next().val();
                    var url = '/home/news/deletecomment/'+ id;
                    $.get(url,{'id':id},function(data){
                      if(data.code == 'success'){
                        $(obje).parent().parent().parent().parent().parent().parent().remove();
                      }else{
                        alert('删除失败');
                      }
                    },'json')
                } 

                  //收藏功能
                   $('#collect').click(function(){
                    var id = $(this).next().html();
                    var url = '/home/news/collect/'+id;
                    $.get(url,{'id':id},function(data){
                      if(data.type == 'quxiao'){
                            if(data.code == 'success'){
                                  $('#collect').html('收藏');
                                  $('#a_favorite').attr('onmouseover','this.title =' +data.num + ' 人收藏');
                            }else{
                                alert('取消收藏失败');
                            }
                      } else if(data.type == 'shoucang'){
                            if(data.code == 'success'){
                                  $('#collect').html('已收藏');
                                  $('#a_favorite').attr('onmouseover','this.title =' +data.num + ' 人收藏');
                            }else{
                                alert('收藏失败');
                            }
                      }
                    },'json');
                  });

                  //点赞功能
                  praise = function(obj){
                    var id = $('#collect').next().html();
                    var url = '/home/news/praise/'+id;
                    $.get(url,{'id':id},function(data){
                      if(data.code == 'success'){
                        if(data.type == 'praise'){
                            $(obj).children(1).attr('src','/home/picture/praised.png');
                            $('.trample').attr('onclick','');
                        }else{
                             $(obj).children(1).attr('src','/home/picture/praise.png');
                             $('.trample').attr('onclick','trample(this)');
                        }
                      }else{
                        alert('操作失败');
                      }
                    },'json');
                  }

                  //点踩功能
                  trample = function(obj){
                    var id = $('#collect').next().html();
                    var url = '/home/news/trample/'+id;
                    $.get(url,{'id':id},function(data){
                      if(data.code == 'success'){
                        if(data.type == 'trample'){
                            $(obj).children(1).attr('src','/home/picture/trampled.png');
                            $('.praise').attr('onclick','');
                        }else{
                             $(obj).children(1).attr('src','/home/picture/trample.png');
                             $('.praise').attr('onclick','praise(this)');
                        }
                      }else{
                        alert('操作失败');
                      }
                    },'json');
                  }
          });
            </script>
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
  </div> 
  @endsection