@extends('home.layout.index')
@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
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
     <div class="bm bw0" id="paihang"> 
      <h1 class="mt">用户排行</h1> 
      <ul class="tb cl" id="rank_top"> 
       <li @if($type == 0 ) class="a" @endif><a href="/home/rank/index/{{0}}">积分排行</a></li> 
       <li @if($type == 1 ) class="a" @endif><a href="/home/rank/index/{{1}}">粉丝量排行</a></li> 
       <li @if($type == 2 ) class="a" @endif><a href="/home/rank/index/{{2}}">发帖量排行</a></li> 
       <li @if($type == 3 ) class="a" @endif><a href="/home/rank/index/{{3}}">连续签到排行</a></li> 
      </ul> 
            <div >
              <div class="tbmu"> 
               <h3 class="mbn">排行榜公告:</h3> 您现在还没有上榜。让自己上榜吧，这会大大提升您的主页曝光率。 
               <br/>
                   @if($type == 0)
                    积分
                    @elseif($type == 1)
                   粉丝量
                    @elseif($type == 2)
                   发帖量
                   @else
                   连续签到天数
                   @endif
               <span>越多,排名越靠前，您的主页曝光率也会越高；  </span>
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
                  <dd class="m avt">@if($type == 0)
                              <a href="/home/personal/index/{{$value->users_id}}" target="_blank" c="1"><img src="/uploads/{{$value->face}}" /></a>
                          @elseif($type == 1)
                              <a href="/home/personal/index/{{$value->id}}" target="_blank" c="1"><img src="/uploads/{{$value->getUserInfo->face}}" /></a>
                          @elseif($type == 2)
                   <a href="/home/personal/index/{{$value->id}}" target="_blank" c="1"><img src="/uploads/{{$value->getUserInfo->face}}" /></a>
                         @else
                              <a href="/home/personal/index/{{$value->users_id}}" target="_blank" c="1"><img src="/uploads/{{$value->face}}" /></a>
                         @endif
                  </dd> 
                  <dt class="y">
                    @if($value->id == $self)

                    @else
                       <p class="xw0"><a href="" target="_blank">串个门</a></p> 
                       <p class="xw0"><a href="" id="a_sendpm_4" >发私信</a></p> 
                       <p class="xw0"><a href="" id="a_friend_4" title="加为好友"></a></p>
                    @endif
                   
                  </dt> 
                  <dt>
                   <a href="space-uid-4.html" target="_blank">
                          @if($type == 0)
                            {{$value->getUsers->uname}}
                          @elseif($type == 1)
                            {{$value->uname}}
                          @elseif($type == 2)
                            {{$value->uname}}
                         @else
                            {{$value->getUsers->uname}}
                         @endif
                    </a> 
                  </dt> 
                  <dd> 
                   <p> </p> 
                   <p>
                         @if($type == 0)
                          积分:
                          @elseif($type == 1)
                         粉丝量:
                          @elseif($type == 2)
                         发帖量:
                         @else
                         连续签到天数:
                         @endif
                    <span id="">
                           @if($type == 0)
                              {{$value->sign_number}}
                          @elseif($type == 1)
                              {{$value->fans_count}}
                          @elseif($type == 2)
                              {{$value->art_count}}
                         @else
                              {{$value->sign_days}}
                         @endif
                        
                    </span></p>
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
      <ul id="rank_type" > 
       <li class=""><a href="#">全部</a></li> 
       <li class="a"><a href="/home/rank/index/{{0}}">用户</a></li> 
       <li class=""><a href="/home/rank/articles/{{0}}">文章</a></li> 
       <li class=""><a href="/home/rank/girls/{{0}}">车模</a></li> 
       <li class=""><a href="/home/rank/news/{{0}}">新闻</a></li>  
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
@endsection