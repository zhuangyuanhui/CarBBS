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
                    	<span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/users" method="post"  enctype="multipart/form-data">
                              {{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                                        <label class="mws-form-label">上传头像</label>
                                        <div class="mws-form-item" style="width:150px">
                                            <input type="file" onchange="preview(this)"  multiple class="small" name="profiles" id="profiles">
                                            <label for="profiles"><div id="preview" style="width:150px"></div>
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户名</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="uname" value="{{ old('uname') }}">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户密码</label>
                                        <div class="mws-form-item">
                                             <input type="password" class="small" name="upwd" value="">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">确认密码</label>
                                        <div class="mws-form-item">
                                             <input type="password" class="small" name="reupwd" value="">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户邮箱</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="email" id="email" value="{{ old('email') }}">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">邮箱验证</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="email_code" value="" style="width: 600px">
                                             <a href="javascript:;" onclick="sendEmailCode()"><span class="btn btn-success" id="dyMobileButton" style="width: 160px"> 接 受 邮 箱 验 证 码 </span></a>
                                        </div>
                                   </div>   

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户手机</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" id="tel" name="tel" value="{{ old('tel') }}">
                                        </div>
                                   </div>                                   


                                  
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="添加" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                <!-- 浏览用户头像 -->
                <script type="text/javascript">
                    function preview(file){
                        if (file.files && file.files[0]){ 
                        var reader = new FileReader(); 
                        reader.onload = function(evt){ 
                            $("#preview").html('<img src="' + evt.target.result + '" style="height:120px;width:120px;margin:4px;border-radius:70px 70px" />'); 
                        } 
                            reader.readAsDataURL(file.files[0]); 
                        } else {
                            $("#preview").html('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>'); 

                              } 
                        }
                </script>
               
                <!-- 发送邮箱验证码 -->
                <script type="text/javascript">
                            var time = 5;
                            var flag = true;   //设置点击标记，防止5内再次点击生效
                         
                            //发送验证码
                                $('#dyMobileButton').click(function(){
                                    $(this).attr("disabled",true);
                                    if(flag){
                                        var timer = setInterval(function () {
                                            if(time == 5 && flag){
                                                $("#dyMobileButton").html("已发送");
                                                flag = false;
                                                var email = $('#email').val();
                                                var email_preg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
                                                if(!email_preg.test(email)){
                                                  return false;
                                                 }
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