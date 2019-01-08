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
     <a href="space-uid-6.html">{{$users->nickname}} </a> 
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
     <h2 class="mt">{{$users->nickname}}  </h2> 
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
      <li ><a href="/home/personal/index/{{$users->id}}"><img src="/home/picture/space_profile.png" class="vm" />&nbsp;&nbsp;资料&nbsp;&nbsp;</a></li> 
      <li class="a"><a href=""><img src="/home/picture/space_thread.png" class="vm" />&nbsp;&nbsp;文章&nbsp;&nbsp;</a></li> 
      <li><a href=""><img src="/home/picture/space_blog.png" class="vm" />&nbsp;&nbsp;收藏&nbsp;&nbsp;</a></li> 
      <li><a href=""><img src="/home/picture/space_album.png" class="vm" />&nbsp;&nbsp;关注&nbsp;&nbsp;</a></li> 
      <li><a href=""><img src="/home/picture/space_doing.png" class="vm" />&nbsp;&nbsp;粉丝&nbsp;&nbsp;</a></li> 
      <li><a href=""><img src="/home/picture/space_share.png" class="vm" />&nbsp;&nbsp;私信&nbsp;&nbsp;</a></li> 
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
    <p class="tbmu">
      <a href="javascript:;" class="a">主题</a>
      <a href="/home/articles/create">发表文章</a>
    </p>

    <div class="tl">
      <form method="post" autocomplete="off" name="delform" id="delform" action="" >
        <input type="hidden" name="formhash" value="0408893d">
        <input type="hidden" name="delthread" value="true">
        <table cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td class="icn">&nbsp;</td>
              <td class="frm">文章标题</td>
              <td class="num">所属板块</td>
              <td class="by">浏览量</td>
              <td class="by">点赞量</td>
              <td class="by">发表时间</td>
            </tr>
            @foreach($articles as $key=>$value)
            <tr>
              <td class="icn">
                <a href="/home/articles/{{$value->id}}/edit" title="新窗口打开" target="_blank">
                  <img src="/uploads/{{$value->cover}}"></a>
              </td>
              <th>
                <a href="/home/articles/{{$value->id}}/edit" target="_blank">{{$value->title}}</a></th>
              <td>
                <a href="/home/articles/{{$value->id}}/edit" class="xg1" target="_blank">{{$value->getCate->cname}}</a></td>
              <td class="num">
                <a href="/home/articles/{{$value->id}}/edit" class="xi2" target="_blank">{{$value->clicks}}</a>
               </td>
              <td class="num">
                <a href="/home/articles/{{$value->id}}/edit" class="xi2" target="_blank">{{$value->praise}}</a>
                </td>
              <td class="by">
                <em>
                  <a href="/home/articles/{{$value->id}}/edit" target="_blank">
                    <span title="2019-1-4 18:37">{{date('Y-m-d H:i:s',$value->ctime)}}</span></a>
                </em>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </form>
    </div>
    <!--[diy=diycontentbottom]-->
    <div id="diycontentbottom" class="area"></div>
    <!--[/diy]--></div>
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