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
          <form  id="info_file" action="upload_file.php" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="profile" value="" id="profile" style="display: none">
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
      <li class="a"><a href=""><img src="/home/picture/space_profile.png" class="vm" />&nbsp;&nbsp;资料&nbsp;&nbsp;</a></li> 
      <li><a href=""><img src="/home/picture/space_thread.png" class="vm" />&nbsp;&nbsp;文章&nbsp;&nbsp;</a></li> 
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

<div class="mn">
<div class="bm bw0">
<!--don't close the div here--><ul class="tb cl">
<li class="a"><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=base">修改个人密码</a></li>
</ul><iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>

<form action="/home/personal/save/{{$users->id}}" method="post">
  {{csrf_field()}}
<table cellspacing="0" cellpadding="0" class="tfm" style="margin: 20px">
<tbody>
<tr>
<th>原密码</th>
<td>
<input type="text" name="pass" id="qw" class="px" value="">
<div class="rq mtn" id="showerror_realname"></div><span class="www"><br></span></td>
</tr>
<tr>
<th>修改密码</th>
<td>
<input type="text" name="repass" id="qwe" class="px" value="" placeholder="">
<div class="rq mtn" id="showerror_realname"></div><span class="www"><br></span></td>
</tr>
<tr>
<th>确认密码</th>
<td>
<input type="text" name="repasd" id="qwer" class="px" value="">
<div class="rq mtn" id="showerror_realname"></div><span class="www"><br></span></td>
</tr>
</tr>

<tr>
<th>&nbsp;</th>
<td colspan="5" >
<button type="submit" class="submit">修改</button>
<span id="submit_result" ></span>
</td>
</tr>
</tbody></table>
</form>
<script>
  $(function(){

      //密码 确认密码 标识符   全为true时才可提交注册                         
      var isPass,isRePass = false;

      $('#qw').blur(function(){
          var pass = $(this).val();
          var url = '/home/personal/hold/'+ pass;

          $.get(url,{'pass':pass},function(data){
              if (data.code =='error') {
                isPass = false;
                $('.www').eq(0).html('<font style="color:red">旧密码错误,请重试</font>');
              }else{
                isPass = true;
                $('.www').eq(0).html('<font style="color:green">密码正确,请输入新密码</font>');
              }
          },'json');
      })

      //检测 修改密码
      $('#qwe').keyup(function(){
          //获取 新密码
          var repass = $(this).val();

          //设置正则
          var repass_preg = /^[a-zA-Z]{1}/;
          //正则匹配密码格式
          if( repass.length < 5 ){
              isPass = false;
              $('.www').eq(1).html('<font style="color:red">密码以字母开头,可由字母、数字、特殊符号组成，长度最小为6个字符</font>');

          }else if(repass_preg.test(repass)){
              //验证密码强度
              //声明数组当作标识符
              var arr = [];
              isPass = true;
              // 检测数字
              var number_preg = /[0-9]+/g;
              if(number_preg.test(repass)){
                  arr.push('数字');
              }

              // 检测小写字母
              var small_str_preg = /[a-z]+/g;
              if(small_str_preg.test(repass)){
                  arr.push('小写字母');
              }
              // 检测大写字母
              var big_str_preg = /[A-Z]+/g;
              if(big_str_preg.test(repass)){
                  arr.push('大写字母');
              }
              // 特殊符号
              var t_str_preg = /[^0-9a-zA-Z]+/g;
              if(t_str_preg.test(repass)){
                  arr.push('特殊符号');
              }

              // 处理密码结果
              switch(arr.length){
                  case 1: $('.www').eq(1).html('<font style="color:#d20">密码为弱</font>');break;
                  case 2: $('.www').eq(1).html('<font style="color:orange">密码为中');break;
                  case 3: $('.www').eq(1).html('<font style="color:blue">密码为强');break;
                  case 4: $('.www').eq(1).html('<font style="color:green">密码为超强');break;

              }

          }


          // $.get(url,{'repass':repass},function(data){
          //     console.log(data);
          // },'json');
      
    })

      
    // 检测 确认密码
      $('#qwer').blur(function(){
          //确认密码
          var repasd = $(this).val();

          //新密码
          var repass = $('#qwe').val();

          //判断两次密码 是否一致
          if(repass == repasd){
              isRePass = true;
              $('.www').eq(2).html('<font style="color:green">密码一致,请确认修改</font>');
          }else{
              isRePass = false;
              $('.www').eq(2).html('<font style="color:red">与新密码不一致,请重新填写</font>');
          }
      });

      //修改按钮点击事件,当密码都正确才能发送提交
      $('.submit').click(function(){
          if (isPass && isRePass) {
            return true;
          }else{
            return false;
          }
      });
  })
</script>
</div>
</div>


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