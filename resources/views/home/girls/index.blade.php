@extends('home.layout.index')

@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
	<div id="wp" class="wp time_wp cl">
   <!--[name]quater_6_che - 车模[/name]-->
   <link rel="stylesheet" type="text/css" href="/home/css/chemo.css" /> 
   <script src="/home/js/jquery.superslide.js" type="text/javascript"></script>
   <style id="diy_style" type="text/css">

</style> 
  </div> 
  <div class="wp"> 
   <!--[diy=diy1]-->
   <div id="diy1" class="area"></div>
   <!--[/diy]--> 
   <div id="ct" class="ct2 wp inside_box cl" style="margin: 20px 0 0 0;"> 
    <div class="cl"> 
     <!--[diy=listcontenttop]-->
     <div id="listcontenttop" class="area"></div>
     <!--[/diy]--> 
     <div class="cl" style="float: none; padding: 0; margin: 0; box-shadow: noen; background: none;"> 
      <div class="CL" style="margin: 0; background: none;"> 
       <!-- 车模列表 begin --> 
       <div class="list_new Framebox cl" style="padding: 0;"> 
        <div class="recommend_article cl" style="box-shadow: none;"> 
         <div class="removeline cl"> 
         @foreach($girls as $k=>$v)
          <ul id="itemContainer"> 
           <div class="mbox_list recommend_article_list cl" style="width: 254px;height:354px;"> 
            <div class="img_box cl">
             <a href="/home/girls/{{$v->id}}" target="_blank" class="recommend_article_list_pic"><img src="/uploads/{{$v->car_pic}}" alt="{{$v->title}}[图]" width="232" /></a>
            </div> 
            <div class="recommend_article_list_content"> 
             <h3 class="list_title" style="width: 232px;height:42px;font-size: 12px;margin-block-start: 1em;    margin: 0;padding: 0;border: 0;"><a href="/home/girls/{{$v->id}}" target="_blank" style="width: 231.55px;height:37px;text-decoration: none;">{{$v->title}}[图]</a></h3> 
             <div class="recommend_article_list_info">
             {{date('Y-m-d H:i:s',$v->ctime)}}
              <a href="/home/girls/{{$v->id}}" target="_blank" class="icon16link" style="margin-left: 20px;"><i class="s_view"></i>{{$v->clicks}}</a>
             </div> 
            </div> 
           </div> 
          </ul> 
		@endforeach
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
       <div class="" style="text-align: center;">
        
       	{{$girls->links()}}
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
@endsection