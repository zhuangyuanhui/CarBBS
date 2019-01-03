@extends('home.layout.index')
@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" /> 

  
  <div id="wp" class="wp time_wp cl">
   <div id="pt" class="bm cl"> 
    <div class="z"> 
     <a href="./" class="nvhm" title="首页">玩车达人</a> 
     <em>›</em> 
     <a href="misc.php?mod=ranklist">排行</a> 
     <em>›</em> 用户排行 
    </div> 
   </div> 
   <style id="diy_style" type="text/css"></style> 
   <!--[diy=diyranklisttop]-->
   <div id="diyranklisttop" class="area"></div>
   <!--[/diy]--> 
   <div id="ct" class="ct2_a wp cl"> 
    <div class="mn"> 
     <!--[diy=diycontenttop]-->
     <div id="diycontenttop" class="area"></div>
     <!--[/diy]--> 
     <div class="bm bw0"> 
      <h1 class="mt">用户排行</h1> 
      <ul class="tb cl" id="rank_top"> 
       <li class="a"><a href="/home/rank/index/1">积分排行</a></li> 
       <li><a href="/home/rank/index/2">粉丝量排行</a></li> 
       <li><a href="/home/rank/index/3">发帖量排行</a></li> 
       <li><a href="/home/rank/index/4">连续签到排行</a></li> 
      </ul> 
            <div class="paihang">
              <div class="tbmu"> 
               <h3 class="mbn">排行榜公告:</h3> 您现在还没有上榜。让自己上榜吧，这会大大提升您的主页曝光率。 
               <br />积分越多,排名越靠前，您的主页曝光率也会越高；  
              </div> 
              <div class="xld xlda hasrank">
              @foreach($data as $key=>$value)
                 <dl class="bbda cl"> 
                  <dd class="ranknum">
                    @if($key == 0)
                   <img src="/home/picture/rank_1.gif" alt="1" />
                    @elseif($key == 1)
                   <img src="/home/picture/rank_2.gif" alt="2" />
                    @elseif($key == 2)
                   <img src="/home/picture/rank_3.gif" alt="3" />
                   @else
                   {{$key + 1}}
                   @endif
                  </dd> 
                  <dd class="m avt">
                   <a href="space-uid-4.html" target="_blank" c="1"><img src="" /></a>
                  </dd> 
                  <dt class="y"> 
                   <p class="xw0"><a href="" target="_blank">串个门</a></p> 
                   <p class="xw0"><a href="" id="a_sendpm_4" >发私信</a></p> 
                   <p class="xw0"><a href="" id="a_friend_4" title="加为好友">关注他</a></p>
                  </dt> 
                  <dt> 
                   <a href="space-uid-4.html" target="_blank">{{$value->getUsers->uname}}</a> 
                  </dt> 
                  <dd> 
                   <p> </p> 
                   <p>积分: <span id="">{{$value->sign_number}}</span></p>
                  </dd> 
                 </dl>
                 @endforeach 
              </div> 
            </div> 

            <div class="paihang">
              <div class="tbmu"> 
               <h3 class="mbn">排行榜公告:</h3> 您现在还没有上榜。让自己上榜吧，这会大大提升您的主页曝光率。 
               <br />粉丝量越多,排名越靠前，您的主页曝光率也会越高；  
              </div> 
              <div class="xld xlda hasrank">
              @foreach($data as $key=>$value)
                 <dl class="bbda cl"> 
                  <dd class="ranknum">
                    @if($key == 0)
                   <img src="/home/picture/rank_1.gif" alt="1" />
                    @elseif($key == 1)
                   <img src="/home/picture/rank_2.gif" alt="2" />
                    @elseif($key == 2)
                   <img src="/home/picture/rank_3.gif" alt="3" />
                   @else
                   {{$key + 1}}
                   @endif
                  </dd> 
                  <dd class="m avt">
                   <a href="space-uid-4.html" target="_blank" c="1"><img src="" /></a>
                  </dd> 
                  <dt class="y"> 
                   <p class="xw0"><a href="" target="_blank">串个门</a></p> 
                   <p class="xw0"><a href="" id="a_sendpm_4" >发私信</a></p> 
                   <p class="xw0"><a href="" id="a_friend_4" title="加为好友">关注他</a></p>
                  </dt> 
                  <dt> 
                   <a href="space-uid-4.html" target="_blank">{{$value->getUsers->uname}}</a> 
                  </dt> 
                  <dd> 
                   <p> </p> 
                   <p>积分: <span id="">{{$value->sign_number}}</span></p>
                  </dd> 
                 </dl>
                 @endforeach 
              </div> 
            </div> 

            <div class="paihang">
              <div class="tbmu"> 
               <h3 class="mbn">排行榜公告:</h3> 您现在还没有上榜。让自己上榜吧，这会大大提升您的主页曝光率。 
               <br />粉丝量越多,排名越靠前，您的主页曝光率也会越高；  
              </div> 
              <div class="xld xlda hasrank">
              @foreach($data as $key=>$value)
                 <dl class="bbda cl"> 
                  <dd class="ranknum">
                    @if($key == 0)
                   <img src="/home/picture/rank_1.gif" alt="1" />
                    @elseif($key == 1)
                   <img src="/home/picture/rank_2.gif" alt="2" />
                    @elseif($key == 2)
                   <img src="/home/picture/rank_3.gif" alt="3" />
                   @else
                   {{$key + 1}}
                   @endif
                  </dd> 
                  <dd class="m avt">
                   <a href="space-uid-4.html" target="_blank" c="1"><img src="" /></a>
                  </dd> 
                  <dt class="y"> 
                   <p class="xw0"><a href="" target="_blank">串个门</a></p> 
                   <p class="xw0"><a href="" id="a_sendpm_4" >发私信</a></p> 
                   <p class="xw0"><a href="" id="a_friend_4" title="加为好友">关注他</a></p>
                  </dt> 
                  <dt> 
                   <a href="space-uid-4.html" target="_blank">{{$value->getUsers->uname}}</a> 
                  </dt> 
                  <dd> 
                   <p> </p> 
                   <p>积分: <span id="">{{$value->sign_number}}</span></p>
                  </dd> 
                 </dl>
                 @endforeach 
              </div> 
            </div>

            <div class="paihang">
              <div class="tbmu"> 
               <h3 class="mbn">排行榜公告:</h3> 您现在还没有上榜。让自己上榜吧，这会大大提升您的主页曝光率。 
               <br />粉丝量越多,排名越靠前，您的主页曝光率也会越高；  
              </div> 
              <div class="xld xlda hasrank">
              @foreach($data as $key=>$value)
                 <dl class="bbda cl"> 
                  <dd class="ranknum">
                    @if($key == 0)
                   <img src="/home/picture/rank_1.gif" alt="1" />
                    @elseif($key == 1)
                   <img src="/home/picture/rank_2.gif" alt="2" />
                    @elseif($key == 2)
                   <img src="/home/picture/rank_3.gif" alt="3" />
                   @else
                   {{$key + 1}}
                   @endif
                  </dd> 
                  <dd class="m avt">
                   <a href="space-uid-4.html" target="_blank" c="1"><img src="" /></a>
                  </dd> 
                  <dt class="y"> 
                   <p class="xw0"><a href="" target="_blank">串个门</a></p> 
                   <p class="xw0"><a href="" id="a_sendpm_4" >发私信</a></p> 
                   <p class="xw0"><a href="" id="a_friend_4" title="加为好友">关注他</a></p>
                  </dt> 
                  <dt> 
                   <a href="space-uid-4.html" target="_blank">{{$value->getUsers->uname}}</a> 
                  </dt> 
                  <dd> 
                   <p> </p> 
                   <p>积分: <span id="">{{$value->sign_number}}</span></p>
                  </dd> 
                 </dl>
                 @endforeach 
              </div> 
            </div>
      </div>
     <!--[diy=diycontentbottom]-->
     <div id="diycontentbottom" class="area"></div>
     <!--[/diy]--> 
    </div> 
    <div class="appl"> 
     <!--[diy=diysidetop]-->
     <div id="diysidetop" class="area"></div>
     <!--[/diy]-->
     <div class="tbn"> 
      <h2 class="mt bbda">排行榜</h2> 
      <ul> 
       <li class="cl"><a href="javascript:;">全部</a></li> 
       <li class="cl a"><a href="">用户</a></li> 
       <li class="cl"><a href="">文章</a></li> 
       <li class="cl"><a href="">车模</a></li> 
       <li class="cl"><a href="">新闻</a></li>  
      </ul> 
     </div>
     <!--[diy=diysidebottom]-->
     <div id="diysidebottom" class="area"></div>
     <!--[/diy]--> 
    </div> 
   </div> 
   <!--[diy=diyranklistbottom]-->
   <div id="diyranklistbottom" class="area"></div>
   <!--[/diy]-->
  </div>
  <script type="text/javascript">
    $('#rank_top li').click(function(){
        $('#rank_top li').removeClass('a');
        $('.paihang').css('display','none');
        var n = $(this).index();
        $(this).addClass('a');

        $('.paihang:eq('+ n +')').css('display','block');
    });
  </script>
@endsection