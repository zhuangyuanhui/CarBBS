@extends('admin.layout.index')

@section('content')
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
                    	<form class="mws-form" action="/admin/adverts" method="post"  enctype="multipart/form-data">
                              {{ csrf_field() }}
                    		<div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">客户信息</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="acustomer" value="{{ old('acustomer') }}">
                                        </div>
                                   </div>                                  
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">广告标题</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="atitle" value="{{ old('atitle') }}">
                                        </div>
                                   </div> 
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">跳转地址</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="aurl" value="{{ old('aurl') }}">
                                        </div>
                                   </div>

                                    <div class="mws-form-row">
                                        <label class="mws-form-label">广告图片</label>
                                        <div class="mws-form-item" style="width:150px">
                                            <input type="file" onchange="preview(this)"  multiple class="small" name="apic" id="apic" style="visibility: hidden;">
                                            <label for="apic"><div id="preview" style="width:600px;height: 250px;"></div>
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
                <!-- 浏览广告图片 -->
                <script type="text/javascript">
                    function preview(file){
                        if (file.files && file.files[0]){ 
                        var reader = new FileReader(); 
                        reader.onload = function(evt){ 
                            $("#preview").html('<img src="' + evt.target.result + '" style="height:250px;width:600px;margin:4px"/>'); 
                        } 
                            reader.readAsDataURL(file.files[0]); 
                        } else {
                            $("#preview").html('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>'); 

                              } 
                        }
                </script>

@endsection