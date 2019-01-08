@extends('home.layout.index')

@section('content')
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
      <a href="space-uid-6.html"><img src="picture/avatar.php" /></a>
     </div> 
     <h2 class="mt"> 方希 </h2> 
     <p class="follow_us"> <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=71293015&amp;fuid=6" class="new1">收听TA</a> <a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=6&amp;handlekey=addfriendhk_6" id="a_friend_li_6" onclick="showWindow(this.id, this.href, 'get', 0);" class="xi2 new1">加为好友</a> <a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_6&amp;touid=6&amp;pmid=0&amp;daterange=2" id="a_sendpm_6" onclick="showWindow('showMsgBox', this.href, 'get', 0)" title="发送消息" class="old1">发送消息</a> <script type="text/javascript">

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
      <li><a href="/home/articles/create"><img src="javascript:;" class="vm" />编辑文章</a></li> 
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
         <div style="margin-left: 150px;">
           <form action="/home/drafts/save/{{ $id }}" id="articles_info" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
              {{ method_field('PUT') }}
            <div class="form-group">
              <label for="exampleInputEmail1">文章类型</label>
              <select class="form-control" name="cates_id" style="width: 770px;">
                      <option value=""><--请选择--></option>
                      @foreach($Cates as $k => $v)
                      <option value="{{ $v->id }}" @if( $draft->cates_id == $v->id ) selected @endif >{{ $v->cname }}</option>
                      @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">文章标题</label>
              <input type="text" class="form-control" name="title" id="exampleInputPassword1" placeholder="文章标题" value="{{ $draft->title }}" style="width: 770px;">
            </div> 

           <div style="width: 670px;">
              <label for="exampleInputPassword1">云标签</label><br>
              @foreach($Labels as $k => $v)
              <div class="btn btn-success" style="margin-left: 20px;margin-top: 20px;">
                 <input type="checkbox"   name="labels[]" value="{{ $v->id }}"  @if( in_array( $v->id , $lab ) ) checked @endif >{{ $v->lname }}
              </div>
              @endforeach
          </div>

          <script type="text/javascript">
            $('.btn:even').removeClass('btn-success');
            $('.btn:even').addClass('btn-info');
            $('.btn:even').append('<br/>');
          </script>
  
          <div class="form-group">
            <label for="exampleInputPassword1">文章内容</label>
            <!-- 加载编辑器的容器 -->
            <script id="container" style="width:770px;height:400px" name="content" type="text/plain">
              {!! $draft->content !!}
            </script>
          </div>

          <div class="form-group">
                <label for="exampleInputFile">文章封面</label>
                <div style="width:770px;display: none;">
                <input type="file"  multiple class="small" name="cover" onchange="preview(this)" id="exampleInputFile" placeholder="请选择图片上传" style="display: none;">
                </div>
                <label for="exampleInputFile">
                  <div id="picList" style="width:200px;height: 200px;background: url(/home/images/jia.jpg) "></div>
                </label>
           </div>
          <button type="submit"  style="width: 670px;" class="btn btn-success">提交</button>
          <a href="javascript:;" id="save" style="width: 100px;" ><span class="btn btn-warning">保存草稿箱</span></a>

        </form>
          <script teype="text/javascript">
            $(function(){
              $('#save').click(function(){
                $.ajax({
                  url:"/home/drafts/{{ $id }}",
                  type:'post',
                  data:new FormData($('#articles_info')[0]), //创建表单数据
                  processData:false,                         //不限定格式
                  contentType:false,                         //不进行特定格式编码
                  dataType:'html',
                  success:function(msg){
                    console.log(msg);
                    if(msg == 'success'){
                      alert('保存到草稿箱');
                    }else{
                      alert('保存失败');
                    }
                  }
                });
              });
            });
          </script>
      </div>

       <!-- 配置文件 -->
              <script type="text/javascript" src="/home/utf8-php/ueditor.config.js"></script>
              <!-- 编辑器源码文件 -->
              <script type="text/javascript" src="/home/utf8-php/ueditor.all.js"></script>
              <!-- 实例化编辑器 -->
              <script type="text/javascript">
                  var ue = UE.getEditor('container',{toolbars: [
                                       ['fullscreen', 'source', 'undo', 'redo'],
                                       ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist','insertunorderedlist', 'selectall', 'cleardoc']
                                   ]});

                  //上传前图片预览
                  function preview(obj){
                   var length = obj.files.length;
                   //多图上传时遍历文件信息（可以通过object.files查看）
                   for (var i = 0; i < length; i++) {//循环输出预览图片
                    jQuery('#picList').append('<img src="'+window.URL.createObjectURL(obj.files[i])+'" style="width:200px;height:200px;margin:4px"/>');
                    }
                   }
                  
              </script>


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