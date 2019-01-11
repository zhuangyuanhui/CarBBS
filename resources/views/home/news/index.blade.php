@extends('home.layout.index')
@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
  <script src="/home/js/jquery.min.js" type="text/javascript"></script> 
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
  <link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" /> 
 
  <div id="wp" class="wp time_wp cl">
   <link rel="stylesheet" type="text/css" href="/home/css/list.css" /> 
   <script src="/home/js/jquery.superslide.js" type="text/javascript"></script>
   <style id="diy_style" type="text/css"></style> 
  </div> 
  <div class="wp"> 
   <!--[diy=diy1]-->
   <div id="diy1" class="area"></div>
   <!--[/diy]--> 
   <div id="ct" class="ct2 wp inside_box cl" style="margin: 20px 0 0 0;"> 
    <div style="float: left; width: 770px;"> 
     <!--[diy=listcontenttop]-->
     <div id="listcontenttop" class="area">
      <div id="frameyP1E8f" class="frame move-span cl frame-1">
       <div id="frameyP1E8f_left" class="column frame-1-c">
        <div id="frameyP1E8f_left_temp" class="move-span temp"></div>
        <div id="portal_block_236" class="block move-span">
         <div id="portal_block_236_content" class="dxb_bc">
          <div class="douban" style="width: 750px;height:300px"> 
           <div class="bd"> 
            <ul>
              @foreach($news_nine as $key=>$value)
             <li> 
              <a href="article-40-1.html" target="_blank"><img src="/uploads/{{$value->news_pic}}" style="width:223px;height: 130px" />
             </a> 
             <h3 style="width: 195px;height: 30px"><a href="article-40-1.html">{{$value->title}}</a></h3> 
             {!!$value->content!!} 
              </li>
             @endforeach
            </ul> 
           </div> 
           <div class="hd"> 
            <ul> 
             <li></li> 
             <li></li> 
             <li></li> 
            </ul> 
           </div> 
          </div> 
          <script type="text/javascript">jQuery(".douban").slide({ mainCell:".bd ul", autoPlay:true, effect:"left", delayTime:800,vis:3, scroll:3,pnLoop:false,trigger:"click"});</script>
         </div>
        </div>
       </div>
      </div>
     </div>
     <!--[/diy]--> 
     <div class="mn cl" style="float: none; padding: 0; margin: 0; box-shadow: 0px 1px 1px rgba(0,0,0,0.08); background: #FFFFFF;"> 
      <div style="width: 750px;height: 52px" class="tit_top wp cl"> 
       <h3>{{ $cate->cname or '新闻' }}</h3>
       <div class="cl" style="float: left; min-width: 200px; min-height: 30px;">
        <!--[diy=diy_info]-->
        <div id="diy_info" class="area"></div>
        <!--[/diy]-->
       </div> 
      </div> 
      <div class="bm" style="margin: 0; background: none;"> 
       <!-- 文章列表 begin --> 
       <div class="list_new Framebox cl" style="padding: 0;"> 
        <div class="box recommend_article" style="box-shadow: none;"> 
         <div class="removeline cl"> 
          <ul id="itemContainer"> 
           @foreach($news as $key=>$value)
           <div class="mbox_list recommend_article_list cl" style="width:710px;height: 183px;margin-left: 20px"> 
            <a href="/home/news/{{$value->id}}/details" target="_blank" class="recommend_article_list_pic"><img src="/uploads/{{$value->news_pic}}"/></a> 
            <div class="recommend_article_list_content" style="margin-left: 20px"> 
             <h3 class="list_title" style="height: 29px"><a href="/home/news/{{$value->id}}/details" target="_blank" style="">{{$value->title}}</a></h3> 
             <div class="recommend_article_list_simple">
              {!!$value->content!!}
             </div> 
             <div class="recommend_article_list_info"> 
              <a href="/home/news/{{$value->id}}/details" target="_blank" style="width:48.13px;height: 19px"  class="icon16link"><i class="s_view"></i>{{$value->clicks}}</a> 
              <a href="/home/index" target="_blank" class="colorlink">爱车网</a>
              <span class="pipe" style="color: #999999;">/</span>{{date('Y-m-d H:i',$value->ctime)}}
             </div> 
            </div> 
           </div> 
           @endforeach
          </ul> 
         </div> 
        </div> 
       </div> 
       <!-- 文章列表 end --> 
       <!--[diy=listloopbottom]-->
       <div id="listloopbottom" class="area"></div>
       <!--[/diy]--> 
      </div> 
      <!--[diy=diycontentbottom]-->
      <div id="diycontentbottom" class="area"></div>
      <!--[/diy]--> 
      <div class="pgs cl" style="margin-top: 0;">
       <div style="margin-left:570px;margin-bottom: 0px">
        {{$news->links()}}
       </div>
      </div> 
     </div> 
    </div> 
    <div class="sd pph"> 
     <div class="drag"> 
      <!--[diy=diyrighttop]-->
      <div id="diyrighttop" class="area"></div>
      <!--[/diy]--> 
     </div> 
     <!-- 分类 --> 
     <div class="box list_box cl" style="margin: 0;width:310px;height:211px"> 
      <h3 class="modname">相关分类</h3> 
      <div class="portal_sort Framebox2 cl" style="margin:0px; padding: 0px;width:290px;height:161px;"> 
       <ul id="cates_four" style="height:120px;margin-left: 20px;"> 
        @foreach($cates_four as $key=>$value)
        <li><a href="/home/news/index/{{$value->id}}">{{$value->cname}}</a></li> 
        @endforeach
       </ul> 
      </div> 
     </div>
     <style type="text/css">
        .portal_sort ul li{
            width:105px;
            float:left;
            text-align:center;
        }
     </style> 
     <script type="text/javascript">
        $('#cates_four li:odd').css('padding-left','25px');
     </script>
     <!-- 推荐阅读 --> 
     <div class="sbody cl" style="margin: 15px 0 0 0;"> 
      <!--[diy=sbody]-->
      <div id="sbody" class="area"></div>
      <!--[/diy]--> 
     </div> 
     <div class="drag"> 
      <!--[diy=diy2]-->
      <div id="diy2" class="area">
       <div id="framecG3Ad1" class="frame move-span cl frame-1">
        <div id="framecG3Ad1_left" class="column frame-1-c">
         <div id="framecG3Ad1_left_temp" class="move-span temp"></div>
         <div id="portal_block_237" class="block move-span">
          <div id="portal_block_237_content" class="dxb_bc">
           <div class="box s_timeline"> 
            <h3 class="modname">推荐阅读</h3> 
            <div class="s_text_list"> 
             <div class="nano has-scrollbar"> 
              <ul style="right: -17px;" tabindex="0" class="nano-content">
                @foreach($news_top as $key => $value)
               <li><i><span></span></i><a href="/home/news/{{$value->id}}/details" target="_blank">{{$value->title}}</a><p>{{date('Y-m-d H:i',$value->ctime)}}</p></li>
               @endforeach
              </ul> 
             </div> 
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div id="tabol0zUr" class="tab2 frame-tab move-span cl">
        <div id="tabol0zUr_title" class="tab-title title column cl" switchtype="mouseover">

         <div id="portal_block_238" class="block move-span">
          <div class="blocktitle title">
           <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">便民服务</span>
          </div>
          <div id="portal_block_238_content" class="dxb_bc">
           <div class="portal_block_summary">
            <div class="_helplidelist"> 
             <div style="display: block;"> 
              <div class="grid_list"> 
               <ul> 
                <li><a href="#" target="_blank"><span class="grid_list_img"><img src="/home/picture/s_customer.png" height="30" width="30" /></span>在线咨询</a></li> 
                <li><a href="#" target="_blank"><span class="grid_list_img"><img src="/home/picture/s_map.png" height="30" width="30" /></span>公司地址</a></li> 
                <li><a href="#" target="_blank"><span class="grid_list_img"><img src="/home/picture/s_service.png" height="30" width="30" /></span>服务中心</a></li> 
               </ul> 
              </div> 
              <div class="customer_service"> 
               <h4 class="fullfont color">400-8826-226</h4> 
               <p class="font12 color3">电话服务热线时间：9:00 - 21:00</p> 
              </div> 
             </div> 
            </div>
           </div>
          </div>
         </div>
         <div id="portal_block_240" class="block move-span">
          <div class="blocktitle title">
           <span style="float:;margin-left:px;font-size:;color: !important;" class="titletext">关注我们</span>
          </div>
          <div id="portal_block_240_content" class="dxb_bc">
           <div class="portal_block_summary">
            <div class="snswidget" style="display: block;"> 
             <div class="sns_widget">
              <a href="#" title="ZUK官方微博" target="_blank"><img src="/home/picture/wb_sidebar.jpg" height="120" width="120" /></a> 
              <p><a href="#" target="_blank" title="ZUK官方微博">官方微博</a></p> 
             </div> 
             <div class="sns_widget">
              <img src="/home/picture/wx.png" title="扫一扫关注微信" height="120" width="120" /> 
              <p>ZUK微信</p> 
             </div> 
            </div>
           </div>
          </div>
         </div>
        </div>
        <div id="tabol0zUr_content" class="tb-c"></div>
        <script type="text/javascript">initTab("tabol0zUr","mouseover");</script>
       </div>
      </div>
      <!--[/diy]--> 
     </div> 
    </div> 
   </div> 
   <div class="wp mtn"> 
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--> 
   </div>
  </div> 
  @endsection