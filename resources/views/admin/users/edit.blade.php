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
                    	<form class="mws-form" action="/admin/users/{{ $data->id }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                    		          <div class="mws-form-inline">
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">上传头像</label>
                                        <div class="mws-form-item" style="width:150px;display: none">
                                            <input type="file" onchange="preview(this)"  multiple class="small" name="profiles" id="profiles">
                                        </div>
                                         <label for="profiles"><div id="preview" style="width:150px;height: 150px;background: url(/admin/images/jia.jpg);"></div></label>
                                   </div>
                    			         <div class="mws-form-row">
                                        <label class="mws-form-label">用户名</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="uname" value="{{ $data->uname }}">
                                        </div>
                                   </div>

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户邮箱</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="email" value="{{ $data->email }}">
                                        </div>
                                   </div>   

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户手机</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="tel" value="{{ $data->tel }}">
                                        </div>
                                   </div>
                                  
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="修改" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                <script type="text/javascript">
                    function preview(file){
                        if (file.files && file.files[0]){ 
                        var reader = new FileReader(); 
                        reader.onload = function(evt){ 
                            $("#preview").html('<img src="' + evt.target.result + '" style="height:120px;width:120px;margin:4px;border-radius:60px 60px" />'); 
                        } 
                            reader.readAsDataURL(file.files[0]); 
                        } else {
                            $("#preview").html('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>'); 

                              } 
                        }
                </script>
@endsection