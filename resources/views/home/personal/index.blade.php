@extends('home.layout.personal')
@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" />
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
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
         <h2 class="cl" style="font-size: 16px; margin-bottom: 15px;"> {{$users->uname}} <li style="display: inline-block; margin-left: 10px;"><span style="color:" class="xi2" onmouseover="showTip(this)" tip="积分 7, 距离下一级还需 43 积分"><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=10" target="_blank" style="color: #BBBBBB;">连续签到10天以下积分每次加5,10天以上积分加10,20天加15为封顶</a></span> </li> </h2> 
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
    @endsection