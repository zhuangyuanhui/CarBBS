@extends('home.layout.personal')

@section('content')
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />
<div id="ct" class="ct1 wp cl" style="min-height:310px;width: 1080px;margin: 0 auto;border: 0;zoom: 1;">
	<div class="mn" style="overflow: visible;">
		<!--[diy=diycontenttop]-->
		<div id="diycontenttop" class="area">
		</div>
		<!--[/diy]-->
		<div class="bm bw0" style="margin-bottom: 10px;border: none !important;">
			<div class="bm_c" style="padding: 5px 10px 20px 20px;">
				<ul class="flw_ulist">
				@foreach($concern as $k=>$v)
				<li class="cl " style=" padding: 10px 0 10px 100px; border-bottom: 1px solid #DBDBDB; ">
					<a href="/home/personal/index/{{$v->id}}" title="Scientist " id="edit_avt " class="flw_avt
					" shref="home.php?mod=space&amp;uid=4 " style=" float: left; margin: 0 0 0 -80px;
					width: 80px; ">
					<img src="/uploads/{{$v->
					getUserInfo->face}}" style="float: left; margin-left: 15px; width: 48px;">
					</a>
					  @if($users->id == $login_id)
					<a class="guan" onclick="care(this)" href="javascript:;" style="float:right;width: 70px;height: 21px;background: url(/home/images/flw_btn_unfo_s.png) no-repeat 0 0;text-indent: -9999px;overflow: hidden;">
					</a>
					<input type="hidden" name="users_id" value="{{$v->id}}">
					@endif
					<h6 class="pbn xs2" style="padding-bottom: 5px !important;font-size: 14px !important; font-weight: normal;">
						<a href="/home/personal/index/{{$v->id}}" title="Scientist" class="xi2" c="1" shref="home.php?mod=space&amp;uid=4"
						mid="card_5979">
							{{$v->nickname}}
						</a>
						&nbsp;
						<span id="followbkame_4" class="xg1 xs1 xw0" style="font-weight: 400;color: #999 !important;font-size: 12px !important;">
						</span>
					</h6>
					</li>
					@endforeach
				</ul>
				<br>
				<!--[diy=diycontentbottom]-->
				<div id="diycontentbottom" class="area">
				</div>
				<!--[/diy]-->
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		
		care =  function(obj){

			var id = $(obj).next().val();
			 var url = '/home/users/concern/' + id;
			jQuery.get(url,{'id':id},function(data){

				//判断是取消还是关注
               if(data.type == 'quxiao'){
                //判断取消是否成功
                  if(data.code == 'success'){
                    	$(obj).parent().remove();
                  }else{
                       alert('取消关注失败');
                  }
                  
                } else if(data.type == 'guanzhu') {
                    //判断关注是否成功
                    if(data.code == 'success'){
                    	
                    }else{
                         alert('关注失败');
                    }
                }
			},'json');
                    //移除所在 属性
		}
		
	});
</script>
@endsection