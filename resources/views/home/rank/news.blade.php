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
     <em>›</em> 新闻排行 
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
      <h1 class="mt">新闻排行</h1> 
      <ul class="tb cl" id="rank_top"> 
       <li @if($type == 0 ) class="a" @endif><a href="/home/rank/news/{{0}}">浏览量排行</a></li> 
       <li @if($type == 1 ) class="a" @endif><a href="/home/rank/news/{{1}}">点赞量排行</a></li> 
      </ul> 
            <div >
               
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
                   <a href="/home/news/{{$value->id}}/details" target="_blank" c="1"><img src="/uploads/{{$value->news_pic}}" /></a>
                  </dd> 
                   
                  <dt> 
                   <a href="/home/news/{{$value->id}}/details" target="_blank">{{$value->title}}</a> 
                  </dt> 
                  <dd> 
                   <p> </p> 
                   <p>
                         @if($type == 0)
                          浏览量:
                         @else
                          点赞量:
                         @endif
                    <span id="">
                           @if($type == 0)
                              {{$value->clicks}}
                         @else
                              {{$value->praise}}
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
       <li ><a href="/home/rank/index/{{0}}">用户</a></li> 
       <li class=""><a href="/home/rank/articles/{{0}}">文章</a></li> 
       <li class=""><a href="/home/rank/girls/{{0}}">车模</a></li> 
       <li class="a"><a href="/home/rank/news/{{0}}">新闻</a></li>  
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