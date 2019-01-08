@extends('home.layout.index')
@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" />
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>

<div id="wp" class="wp time_wp cl">
   <div id="pt" class="bm cl"> 
    <div class="z"> 
     <a href="./" class="nvhm" title="首页">玩车达人</a> 
     <em>›</em> 
     <a href="space-uid-6.html">{{$users->nickname}}</a> 
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
          <label for="profile">
            <img id="face_users" src="/uploads/{{$users->getUserInfo->face}}" title="点击图片更换头像" style="border-radius: 50%;width: 90px;height: 90px">
          </label>
          <form style="display: none;" id="info_file" action="upload_file.php" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            更换头像： <input type="file" name="profile" value="" id="profile">
          </form>
       </div> 
     <h2 class="mt"> {{$users->nickname}} </h2> 
     <p class="follow_us">
        @if($users->id == $login_id)
          <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="" class="new1">我的关注</a>
          <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="" class="new1">我的粉丝</a>
          <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="" class="old1">我的私信</a>
        @else
          <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="" class="new1">关注TA</a>
          <a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="" class="old1">发送私信</a>
        @endif
      </a>
       </p> 
    </div> 
   </div> 
   <div class="wp cl"> 
    <div class="space_nav cl"> 
     <ul class="tb_1 cl"> 
      <li class="a"><a href="#"><img src="/home/picture/space_profile.png" class="vm" />&nbsp;&nbsp;资料&nbsp;&nbsp;</a></li> 
      <li>

        <a href="/home/personal/articles/{{$users->id}}">

          <img src="/home/picture/space_thread.png" class="vm" />&nbsp;&nbsp;文章&nbsp;&nbsp;</a></li>
      <li><a href="/home/personal/users_articles"><img src="/home/picture/space_blog.png" class="vm" />&nbsp;&nbsp;收藏&nbsp;&nbsp;</a></li>
      <li><a href=""><img src="/home/picture/space_album.png" class="vm" />&nbsp;&nbsp;关注&nbsp;&nbsp;</a></li> 
        @if($users->id == $login_id)
      <li><a href=""><img src="/home/picture/space_doing.png" class="vm" />&nbsp;&nbsp;粉丝&nbsp;&nbsp;</a></li> 
      <li><a href=""><img src="/home/picture/space_share.png" class="vm" />&nbsp;&nbsp;私信&nbsp;&nbsp;</a></li>
       @endif
     </ul> 
    </div> 
   </div> 
   <div id="ct" class="ct1 wp cl"> 
    <div class="mn"> 
     <!--[diy=diycontenttop]-->
     <div id="diycontenttop" class="area"></div>
     <!--[/diy]--> 
     <div class="bm bw0"> 
      <div class="bm_c"> 
       <div class="u_profile" style="padding: 10px; font-size: 14px; background: #FFFFFF;"> 
        <div class="pbm mbm cl" style="background: #FFFFFF;"> 
         <ul class="cl bbda pbm mbm" style="font-size: 14px; margin-left: -10px;"> 
          <li> 
           <div style="display: inline-block; padding: 16px 15px; border: 1px solid #EEEEEE; background: #FAFAFA;"> 
            <a href="" target="_blank">粉丝数 {{$users->fans_count}}</a> 
            <span class="pipe" style="margin: 0 15px;">|</span> 
            <a href="" target="_blank">文章数 {{$users->art_count}}</a> 
            <span class="pipe" style="margin: 0 15px;">|</span> 
            <a href="" target="_blank">相册数 0</a> 
            <span class="pipe" style="margin: 0 15px;">|</span>
            <a href="" target="_blank">连续签到天数 {{$users->getUserInfo->sign_days}}</a> 
            <span class="pipe" style="margin: 0 15px;">|</span> 
            <a>积分 {{$users->getUserInfo->sign_number}}</a> 
           </div> </li> 
         </ul> 
         <h2 class="cl" style="font-size: 16px; margin-bottom: 15px;"> {{$users->uname}} <li style="display: inline-block; margin-left: 10px;"><span style="color:" class="xi2" onmouseover="showTip(this)" tip="积分 7, 距离下一级还需 43 积分"><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=10" target="_blank" style="color: #BBBBBB;">新手上路</a></span> </li> </h2> 
         <ul class="pf_l cl pbm mbm"> 
          <li><em>邮箱</em> {{$users->getUserInfo->email}} </li> 
          <li><em>地区</em> {{$users->getUserInfo->addr}}</li> 
         </ul> 
         <ul> 
         </ul> 
         <ul class="pf_l cl ">
          <li style="color: #f63756;"><em>性别</em> 
            @if($users->getUserInfo->sex == 1)
             男
             @elseif($users->getUserInfo->sex == 2)
             女
             @elseif($users->getUserInfo->sex == 3)
             保密
             @endif
           </li> 
          <li><em>年龄</em>{{$users->getUserInfo->age}}</li> 
         </ul>
         <br>
         <ul class="pf_l cl">
          <li><em>简介</em> {{$users->getUserInfo->intro}}</li>  
         </ul> 
        </div> 
        <div class="pbm mbm bbda c">
          @if($users->id == $login_id)
         <a  style="color: #f63756;" href="/home/personal/edit/{{$users->id}}">修改资料</a>
         @endif
        </div> 
        <div class="pbm mbm cl" style="margin-top: 30px; background: #FFFFFF;"> 
         <div class="tag_box cl" style="margin: 10px 0 20px 0;">
          <span class="span-mark-author" style="font-size: 16px;">活跃概况</span>
         </div> 
         <ul id="pbbs" class="pf_l cl"> 
          <li style="width: 250px; height: 65px; line-height: 25px; padding: 10px; overflow: hidden; background: #FAFAFA;">
           <div style="float: left; width: 90px; height: 25px; color: #333333; padding-right: 10px;">
            注册时间
           </div>
           <div style="float: left; width: 135px; height: 25px; overflow: hidden;">
            {{date('Y-m-d H:i:s',$users->ctime)}}
           </div></li> 
          <li style="width: 250px; height: 65px; line-height: 25px; padding: 10px; overflow: hidden; background: #F3F3F3;">
           <div style="float: left; width: 90px; height: 25px; color: #333333; padding-right: 10px;">
            最后访问
           </div>
           <div style="float: left; width: 135px; height: 25px; overflow: hidden;">
            2015-9-6 12:34
           </div></li>  
          <li style="width: 250px; height: 65px; line-height: 25px; padding: 10px; overflow: hidden; background: #F3F3F3;">
           <div style="float: left; width: 90px; height: 25px; color: #333333; padding-right: 10px;">
            上次活动时间
           </div>
           <div style="float: left; width: 135px; height: 25px; overflow: hidden;">
            2015-9-6 12:34
           </div></li> 
          <li style="width: 250px; height: 65px; line-height: 25px; padding: 10px; overflow: hidden; background: #F3F3F3;">
           <div style="float: left; width: 90px; height: 25px; color: #333333; padding-right: 10px;">
            所在时区
           </div>
           <div style="float: left; width: 250px; height: 65px; overflow: hidden;">
            使用系统默认
           </div> </li> 
         </ul> 
        </div> 
       </div>
       <!--[diy=diycontentbottom]-->
       <div id="diycontentbottom" class="area"></div>
       <!--[/diy]-->
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
  <script teype="text/javascript">
  $(function(){
    $('#profile').change(function(){
      $.ajax({
        url:'/home/personal/image',
        type:'post',
        data:new FormData($('#info_file')[0]), //创建表单数据
        processData:false, //不限定格式
        contentType:false, //不进行特定格式编码
        dataType:'json',
        success:function(obj){
          console.log(obj);
          if(obj.msg == 'success'){
            $('#face_users').attr('src','/uploads/'+obj.path);
          }else{
            alert('头像修改失败');
          }
        }
      });
    });
  });


</script>  
    @endsection