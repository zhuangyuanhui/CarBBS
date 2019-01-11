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
    <p class="tbmu">
      <a href="javascript:;" class="a">主题</a>
      @if($users->id == $login_id)
      <a href="/home/articles/create">发表文章</a>
      @endif
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
                  <img src="/home/personal/folder_new.gif"></a>
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
    @endsection