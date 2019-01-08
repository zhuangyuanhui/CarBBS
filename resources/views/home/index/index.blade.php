@extends('home.layout.index')

@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/style_6_common.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_6_misc_ranklist.css" />
<div id="wp" class="wp time_wp cl"><link rel="stylesheet" type="text/css" id="time_diy" href="/home/css/portaldiy.css" />
<style id="diy_style" type="text/css"></style>
<script src="/home/js/jquery.superslide.js" type="text/javascript" type="text/javascript"></script>

<div class="wp">
  <div class="index_content">
    <div class="index_left">
      <div class="box1">
         <!--[diy=diy1]-->
         <div id="diy1" class="area">
         <div id="frameLrA6hN" class="frame move-span cl frame-1">
         <div id="frameLrA6hN_left" class="column frame-1-c">
         <div id="frameLrA6hN_left_temp" class="move-span temp"></div>
         <div id="portal_block_255" class="block move-span">
         <div id="portal_block_255_content" class="dxb_bc">
<div class="focus_box cl">
  <div class="bd">
    <div class="tempWrap" style="overflow:hidden; position:relative; width: 850px;">
      <ul>
      @foreach($slides as $k=>$v)
	      <li style="float: left; width: 850px;">
	     	<a href="{{$v->slides_url}}" target="_blank" title="{{$v->sname}}">
	      	<img src="/uploads/{{$v->slides_img}}" alt="{{$v->sname}}" width="760" height="330"></a>
        	  <div class="t_box blackbg">
         	   <h2><a href="{{$v->slides_url}}" target="_blank">{{$v->sname}}</a></h2>

        	  </div>
        </li>
      @endforeach
        </ul>
    </div>
  </div>
  <div class="hd">
    <ul >
      <li style="background: #4ECDC4;"></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div> 
  <a class="prev btn" href="javascript:;" style="border:#fff;opacity: 0.3"></a>
  <a class="next btn" href="javascript:;" style="border:#fff;opacity: 0.3"	></a>
</div>
		<script type="text/javascript">
			$(function(){
				var i= 1;
				var time = null;
				function shows(i){
					$('.tempWrap li').hide();
					$('.tempWrap li').eq(i).show();

					$('.hd li').css('background','');
					$('.hd li').eq(i).css('background','#4ECDC4');
				}

				function run(){
					if(time==null){
						time = setInterval(function(){
							shows(i);
							i++;
							if (i == $('.tempWrap li').length) {
								i=0;
							}
						},2000);
					}
				}
				 
				run();

				//给下方小图标绑定点击事件
				// $('.cl .hd ul li').mouseover(function(){
				// 	clearInterval(time);
				// 	time = null;

				// 	//获取移入下标
				// 	i= $(this).index();
				// 	shows(i);
				// }).mouseout(function(){
				// 	run();
				// });

				//给轮播图绑定移入移出事件
				$('.focus_box').mouseover(function(){
					clearInterval(time);
					time = null;
					$('.focus_box .btn').css('opacity','0.8');
				}).mouseout(function(){
					run();
					$('.focus_box .btn').css('opacity','0.3');
				})

				//左右侧 绑定前进后退 点击事件
				$('.prev').click(function(){
					i--;
					if (i<0) {
						i = $('.tempWrap li').length-1;
					}
					shows(i);
				});
				$('.next').click(function(){
					i++;
					if (i == $('.tempWrap li').length) {
						i =0 ;
					}
					shows(i);
				});
			});
		</script>
	  </div>
	</div>
  </div>
</div>
<div id="frameRwqqNn" class="frame move-span cl frame-1">
<div id="frameRwqqNn_left" class="column frame-1-c">
<div id="frameRwqqNn_left_temp" class="move-span temp">
</div>
<div id="portal_block_257" class="block move-span">
<div id="portal_block_257_content" class="dxb_bc">
<div class="hot_tag cl">
<div class="tag_logo" style="height:75px;padding:10px;margin-top:0px">
<div class="tag_text" style="float:left;width:85px;height:30px;background-color:#4ECDC4;margin-top:5px;margin-left: -3px;">热 门</div>
<div class="tag_text" style="float:left;width:85px;height:30px;background-color:#4ECDC4;margin-left: -3px;">板 块</div>
</div>
<div class="tag_wrap cl">
<!-- 分类 -->
@foreach($cates as $k=>$v)
<div class="desItem redcolor">
<a href="/home/index/{{$v->id}}">{{$v->cname}}</a></div>
@endforeach

</div>
</div>
</div></div></div></div></div><!--[/diy]-->
      </div>
      <!--[diy=ad1]--><div id="ad1" class="area"></div><!--[/diy]-->
      <div class="box_s1 cl">
      <!--[diy=diy_2]--><div id="diy_2" class="area"></div><!--[/diy]-->    
      <!--[diy=diy2]--><div id="diy2" class="area"><div id="framezOOMy9" class="frame move-span cl frame-1"><div id="framezOOMy9_left" class="column frame-1-c"><div id="framezOOMy9_left_temp" class="move-span temp"></div><div id="portal_block_256" class="block move-span"><div id="portal_block_256_content" class="dxb_bc"><div class="index_tab cl">
   <h3 class="modname">推荐</h3>
</div>
<ul class="ui_list cl" id="itemContainer">
@foreach($article as $k=>$v)
<li class="ui_2_ul_li  cl border_b_gray">
  <div class="ui_2_ul_li_imgouter  ovh position_a"> <a class="fr ds_inlineB cdg" href="/home/articles/{{$v->id}}/edit"><img src="/home/picture/242d5ad24b1bdca33cf2ac7a8639d39f.jpg" width="220" height="140" /></a> </div>
  <div class="ui_2_ul_li_con">
    <h3 class="clr"><a target="_blank" href="/home/articles/{{$v->id}}/edit" class="ui_colorG">{{$v->title}}</a></h3>
    <div class="ui_2_userinfo  clg cl">
      <span><a href="/home/articles/{{$v->id}}/edit">admin</a></span> <span>发表于</span> <em>2016-04-08 14:09</em> 
    </div>
{!!$v->content!!}
    <a class="fr ds_inlineB mr15 cdg" target="_blank" href="/home/articles/{{$v->id}}/edit">阅读全文</a> </div>
</li>
@endforeach
</ul>

<script type="text/javascript">
jQuery.noConflict();
jQuery(function(){
        //首先将#back-to-top隐藏
        jQuery("#holder").hide();
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        jQuery(function () {
            jQuery(window).scroll(function(){
                if (jQuery(window).scrollTop()>100){
                    jQuery("#holder").fadeIn();
                }
                else
                {
                    jQuery("#holder").fadeOut();
                }
            });
            //当点击跳转链接后，回到页面顶部位置
            jQuery("#holder").click(function(){
                jQuery('body,html').animate({scrollTop:0},500);
                return false;
            });
        });
    }); 
</script></div></div></div></div></div><!--[/diy]-->
      </div>
              <script src="/home/js/jpages.js" type="text/javascript"></script>
        <script type="text/javascript">
jQuery.noConflict();
jQuery(function() {
  jQuery("div.holder").jPages({
containerID: "itemContainer",
previous: "",
next: "",
perPage: 9
  });
});
        </script> 
    </div>
    <div class="index_right">
      <!--[diy=right_top]--><div id="right_top" class="area"><div id="framesnVGpZ" class="frame move-span cl frame-1"><div id="framesnVGpZ_left" class="column frame-1-c"><div id="framesnVGpZ_left_temp" class="move-span temp"></div>
      <div id="portal_block_258" class="block move-span">
      <div id="portal_block_258_content" class="dxb_bc">
      <div class="stickright cl" style="height: 350px;">
  <div class="newsrecommend cl">
  <div class="imgbox cl" style="margin-bottom: -10px;"><a href="article-37-1.html"><img src="/home/images/6d2b2ccf44d90c6551f1aa47a310f574.jpg" width="300" height="161">
      
      <span>2.0L的动力卖1.5L的价格，这款全进口SUV估计不到15万！</span></a>
    </div>
    <hr>
      <div class="wrapper" style="margin-top: -8px;height:155px; background-image:url('/home/images/bg1.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
    	@foreach($label as $k=>$v)  
		<a href="/home/index/{{$v->id}}" class="tag">{{$v->lname}}</a>

		@endforeach
	</div>
  </div>
</div></div></div></div></div></div><!--[/diy]-->
      <div class="tabBar cl">
<div class="hd cl">
           <!--[diy=diy_tab]--><div id="diy_tab" class="area"><div id="frameNUNZyT" class="frame move-span cl frame-1"><div id="frameNUNZyT_left" class="column frame-1-c"><div id="frameNUNZyT_left_temp" class="move-span temp"></div><div id="portal_block_259" class="block move-span"><div id="portal_block_259_content" class="dxb_bc"><div class="portal_block_summary"><ul>
  <li class="on">文章排行</li>
  <li>论坛大V</li>
  <li>性感车模</li>
</ul></div></div></div></div></div></div><!--[/diy]-->
</div>
<div class="bd cl">
<div class="conWrap">
<div class="con">
<!--[diy=diy_con1]-->
<div id="diy_con1" class="area">
<div id="frameVEc7E6" class="frame move-span cl frame-1">
<div id="frameVEc7E6_left" class="column frame-1-c">
<div id="frameVEc7E6_left_temp" class="move-span temp"></div>
<div id="portal_block_260" class="block move-span">

<div id="portal_block_260_content" class="dxb_bc"  style="display: block">
@foreach($rank_article as $k=>$v)
<div class="part">
  <div class="paddingbox">
    <div class="part__header">
    @if($k==0)
    <!-- <img src="/home/picture/rank_1.gif" class="loading" width="30" height="30" /> -->
    <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -13px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @elseif($k==1)
  <!-- <img src="/home/picture/rank_2.gif" class="loading" width="30" height="30" /> -->
  <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -66px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @elseif($k==2)
    <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -122px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @else
  <div style="font-size: 16px; float: left;margin-left: 15px;">{{$k+1}}.</div>
  @endif
    <a href="space-uid-1.html" class="author">{{$v->title}}</a></div>
    <div class="text"><a href="thread-20-1-1.html">
      <p><span>{!!$v->content!!}</span></p>
      </a></div>
    <div class="foot">
      <p>{{date('Y-m-d h:i:s',$v->ctime)}}<span class="reply"><i style="margin-right: 10px;"><img src="/home/picture/space_share.png" class="loading" width="20" height="20";/></i>{{$v->praise}}</span></p>
    </div>
  </div>
</div>
@endforeach
</div>




<div id="portal_block_260_content" class="dxb_bc"  style="display: block">
@foreach($rank_users as $k=>$v)
<div class="part">
  <div class="paddingbox">
    <div class="part__header">
    @if($k==0)
    <!-- <img src="/home/picture/rank_1.gif" class="loading" width="30" height="30" /> -->
    <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -13px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @elseif($k==1)
  <!-- <img src="/home/picture/rank_2.gif" class="loading" width="30" height="30" /> -->
  <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -66px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @elseif($k==2)
    <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -122px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @else
  <div style="font-size: 16px; float: left;margin-left: 15px;">{{$k+1}}.</div>
  @endif
    <div><a href="space-uid-1.html" class="author" style="margin-left: 96px;font-size: 16px;
    font-weight: 500;"><img src="/uploads/{{$v->face}}" alt="">{{$v->getUsers->uname}}</a></div></div>
    <div class="text"><a href="thread-20-1-1.html">
      
      </a></div>
    <div class="foot">
      <p><span class="reply" style="margin-right: 66px;right: -4px;"><i style=""></i>积分量 : {{$v->sign_number}}</span></p>
    </div>
  </div>
</div>
@endforeach
</div>




<div id="portal_block_260_content" class="dxb_bc"  style="display: block">
@foreach($rank_girls as $k=>$v)
<div class="part">
  <div class="paddingbox">
    <div class="part__header">
    @if($k==0)
    <!-- <img src="/home/picture/rank_1.gif" class="loading" width="30" height="30" /> -->
    <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -13px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @elseif($k==1)
  <!-- <img src="/home/picture/rank_2.gif" class="loading" width="30" height="30" /> -->
  <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -66px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @elseif($k==2)
    <div style="background: url(/home/picture/top1.jpg) no-repeat scroll -122px -23px;
    background-size: 171px 83px;
    width: 38px;
    height: 40px;
    float: left;"></div>
    @else
  <div style="font-size: 16px; float: left;margin-left: 15px;">{{$k+1}}.</div>
  @endif
    <a href="space-uid-1.html" class="author">{{$v->title}}</a></div>
    <div class="text"  style="width:30px;height:20px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="thread-20-1-1.html">
      <p style="font-size:12px">{!!$v->content!!}</p>
      </a></div>
    <div class="foot">
      <p>{{date('Y-m-d h:i:s',$v->ctime)}}<span class="reply"><i style="margin-right: 10px;"><img src="/home/picture/space_share.png" class="loading" width="20" height="20";/></i>{{$v->clicks}}</span></p>
    </div>
  </div>
</div>
@endforeach
</div>

</div></div></div></div><!--[/diy]-->
</div>
</div>
</div>
</div>
  <script type="text/javascript">
     jQuery(".tabBar").slide({ mainCell:".conWrap", effect:"fold", pnLoop:false });
  </script>
      <!--[diy=diy_last]--><div id="diy_last" class="area"></div><!--[/diy]-->
    </div>
    <div class="cr"></div>
  </div>
</div>

 </div>

@endsection