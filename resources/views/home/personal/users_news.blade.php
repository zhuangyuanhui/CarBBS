@extends('home.layout.personal')
@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" />
   <div id="ct" class="ct1 wp cl"> 
    <div class="mn"> 
     <!--[diy=diycontenttop]-->
     <div id="diycontenttop" class="area"></div>
     <!--[/diy]--> 


<div class="bm bw0">
  <div class="bm_c">
    <p class="tbmu">
      <a href="/home/personal/users_articles/{{$login_id}}" >文章</a>
      <a href="/home/personal/users_news/{{$login_id}}" class="a">新闻</a>
      <a href="/home/personal/users_girls/{{$login_id}}" >车模</a>
    </p>
    <div class="tl">
      <form method="post" autocomplete="off" name="delform" id="delform" action="" >
        <input type="hidden" name="formhash" value="0408893d">
        <input type="hidden" name="delthread" value="true">
        <table cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td class="icn">&nbsp;</td>
              <td class="frm">新闻标题</td>
              <td class="num">所属板块</td>
              <td class="by">浏览量</td>
              <td class="by">点赞量</td>
              <td class="by">发表时间</td>
            </tr>
            @foreach($news as $key=>$value)
            <tr>
              <td class="icn">
                <a href="/home/news/{{$value->id}}/details" title="新窗口打开" target="_blank">
                  <img src="/home/personal/folder_new.gif"></a>
              </td>
              <th>
                <a href="/home/news/{{$value->id}}/details" target="_blank">{{$value->title}}</a></th>
              <td>
                <a href="/home/news/{{$value->id}}/details" class="xg1" target="_blank">{{$value->getCate->cname}}</a></td>
              <td class="num">
                <a href="/home/news/{{$value->id}}/details" class="xi2" target="_blank">{{$value->clicks}}</a>
               </td>
              <td class="num">
                <a href="/home/news/{{$value->id}}/details" class="xi2" target="_blank">{{$value->praise}}</a>
                </td>
              <td class="by">
                <em>
                  <a href="/home/news/{{$value->id}}/details" target="_blank">
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
    @endsection