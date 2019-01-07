@extends('home.layout.index')
@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" />

<div id="wp" class="wp time_wp cl">
      <div id="pt" class="bm cl">
        <div class="z">
          <a href="./" class="nvhm" title="首页">玩车达人</a>
          <em>&rsaquo;</em>
          <a href="misc.php?mod=ranklist">排行</a>
          <em>&rsaquo;</em>文章排行</div></div>
      <style id="diy_style" type="text/css"></style>
      <!--[diy=diyranklisttop]-->
      <div id="diyranklisttop" class="area"></div>
      <!--[/diy]-->
      <div class="ct2_a wp cl">
        <div class="mn">
          <!--[diy=diycontenttop]-->
          <div id="diycontenttop" class="area"></div>
          <!--[/diy]-->
          <div class="bm bw0">
            <h1 class="mt">文章排行</h1>
            <ul class="tb cl">
              <li @if($type == 0 ) class="a" @endif >
                <a href="/home/rank/articles/{{0}}">浏览量排行</a></li>
              <li @if($type == 1 ) class="a" @endif>
                <a href="/home/rank/articles/{{1}}">点赞量排行</a></li>
              
            </ul>
            <div class="tl">
              <table cellspacing="0" cellpadding="0">
                <tbody>
                  <tr class="th">
                    <td class="icn">&nbsp;</td>
                    <th>主题</th>
                    <td class="frm">
                      @if($type == 0)
                            浏览量
                      @elseif($type == 1)
                          点赞量
                      @else
                          收藏量
                       @endif
                    </td>
                    <td class="frm">版块</td>
                    <td class="by">作者</td>
                    <td width="90">发表时间</td></tr>
                </tbody>
                @foreach($data as $key=>$value)
                <tr>
                  <td class="icn">
                     @if($key == 0)
                           <img src="/home/picture/rank_1.gif" alt="1" />
                            @elseif($key == 1)
                           <img src="/home/picture/rank_2.gif" alt="2" />
                            @elseif($key == 2)
                           <img src="/home/picture/rank_3.gif" alt="3" />
                           @else
                           {{$key + 1}}
                           @endif
                    </td>
                  <th>
                    <a href="thread-12-1-1.html" target="_blank">{{$value->title}}</a></th>
                    <td class="frm">
                    <a href="forum-2-1.html" class="xg1" target="_blank">
                      @if($type == 0)
                            {{$value->clicks}}
                      @elseif($type == 1)
                            {{$value->praise}}
                      @else

                      @endif
                    </a></td>
                  <td class="frm">
                    <a href="forum-2-1.html" class="xg1" target="_blank">{{$value->getCate->cname}}</a></td>
                  <td class="by">
                    <cite>
                      <a href="space-uid-1.html" target="_blank">{{$value->getName->uname}}</a></cite>
                    <em></em></td>
                  <td>
                    <a href="thread-12-1-1.html" class="xi2" target="_blank">{{date('m-d',$value->ctime)}}</a></td>
                </tr>
               @endforeach
              </table>
            </div>
            </div>
          <!--[diy=diycontentbottom]-->
          <div id="diycontentbottom" class="area"></div>
          <!--[/diy]--></div>
        <div class="appl">
          <!--[diy=diysidetop]-->
          <div id="diysidetop" class="area"></div>
          <!--[/diy]-->
          <div class="tbn">
            <h2 class="mt bbda">排行榜</h2>
            <ul>
              <li class=""><a href="#">全部</a></li> 
             <li class=""><a href="/home/rank/index/{{0}}">用户</a></li> 
             <li class="a"><a href="/home/rank/articles/{{0}}">文章</a></li> 
             <li class=""><a href="/home/rank/girls/{{0}}">车模</a></li> 
             <li class=""><a href="/home/rank/news/{{0}}">新闻</a></li>  
            </ul>
          </div>
          <!--[diy=diysidebottom]-->
          <div id="diysidebottom" class="area"></div>
          <!--[/diy]--></div>
      </div>
      <!--[diy=diyranklistbottom]-->
      <div id="diyranklistbottom" class="area"></div>
      <!--[/diy]--></div>
@endsection