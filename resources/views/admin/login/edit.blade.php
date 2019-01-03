@extends('admin.layout.index')

@section('content')
<!-- 显示验证错误信息 -->

@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header" style="height:50px">
                    	<span>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/login/{{ $id }}" method="post"  enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT')}}
                    		<div class="mws-form-inline">

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">旧密码密码</label>
                                        <div class="mws-form-item">
                                             <input type="password" class="small" name="oldupwd" value="">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">新密码</label>
                                        <div class="mws-form-item">
                                             <input type="password" class="small" name="upwd" value="">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">确认新密码</label>
                                        <div class="mws-form-item">
                                             <input type="password" class="small" name="reupwd" value="">
                                        </div>
                                   </div>

<!--                                    <div class="mws-form-row">
                                        <label class="mws-form-label">用户邮箱</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="email" id="email" value="{{ old('email') }}">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">邮箱验证码</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="email_code" value="" style="width: 600px">
                                             <a href="javascript:;" onclick="sendEmailCode()"><span class="btn btn-success" id="dyMobileButton" style="width: 160px"> 接 收 邮 箱 验 证 码 </span></a>
                                        </div>
                                   </div>  -->  

                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="修改" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
               
                <!-- 发送邮箱验证码 -->
                <script type="text/javascript">
                            var time = 5;
                            var flag = true;   //设置点击标记，防止5内再次点击生效
                         
                            //发送验证码
                                $('#dyMobileButton').click(function(){
                                   var email = $('#email').val();
                                        var email_preg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
                                        if(!email_preg.test(email)){
                                          return false;
                                         }
                                    $(this).attr("disabled",true);
                                    if(flag){
                                        var timer = setInterval(function () {
                                            if(time == 5 && flag){
                                                $("#dyMobileButton").html("已发送");
                                                flag = false;
                                         
                                                  var url = '/admin/users/sendemail/'+email;
                                                 //发送AJAX
                                                 $.get(url,{'email':email},function(data){
                                               },'html');
                                            }else if(time == 0){
                                                $("#dyMobileButton").removeAttr("disabled");
                                                $("#dyMobileButton").html("免费获取验证码");
                                                clearInterval(timer);
                                                time = 5;
                                                flag = true;
                                            }else {
                                                $("#dyMobileButton").html(time + " s 重新发送");
                                                time--;
                                            }
                                 },1000);
                              }
                        }); 


                    </script>
@endsection