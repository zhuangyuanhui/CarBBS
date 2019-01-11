@extends('home.layout.personal')

@section('content')
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
				<a href="space-uid-4.html" title="Scientist " id="edit_avt " class="flw_avt
				" shref="home.php?mod=space&amp;uid=4 " style=" float: left; margin: 0 0 0 -80px;
				width: 80px; ">
				<img src="/uploads/{{$v->
					getUserInfo->face}}" style="float: left; margin-left: 15px; width: 48px;">
					</a>
					<a class="guan" onclick="care({{$v->id}})" href="javascript:;" style="float:right;width: 70px;height: 21px;background: url(/home/images/flw_btn_unfo_s.png) no-repeat 0 0;text-indent: -9999px;overflow: hidden;">
						
					</a>
					<h6 class="pbn xs2" style="padding-bottom: 5px !important;font-size: 14px !important; font-weight: normal;">
						<a href="space-uid-4.html" title="Scientist" class="xi2" c="1" shref="home.php?mod=space&amp;uid=4"
						mid="card_5979">
							{{$v->nickname}}
						</a>
						&nbsp;
						<span id="followbkame_4" class="xg1 xs1 xw0" style="font-weight: 400;color: #999 !important;font-size: 12px !important;">
						</span>
					</h6>
					<p class="ptm xg1" style="padding-top: 10px !important;color: #999 !important;">
						粉丝:
						<a href="home.php?mod=follow&amp;do=follower&amp;uid=4" style="color: #999 !important;">
							<strong class="xi2" id="followernum_4">
							</strong>
						</a>
						人 &nbsp; 关注:
						<a href="home.php?mod=follow&amp;do=following&amp;uid=4">
							<strong class="xi2" style="color: #999 !important;">
							</strong>
						</a>
						人 &nbsp;
					</p>
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
		
		care =  function(id){
			var url = '/home/personal/care/'+id;
			$.get(url,{'id':id},function(msg){
				if(msg.code = 'error'){
                    //移除所在 属性
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
                    //
				};
			});
		}
		
	});
</script>
@endsection