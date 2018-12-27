@extends('admin.layout.index')

@section('content')
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header" style="height:50px">
                    	<span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="form_layouts.html">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">姓名</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">手机</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">邮箱</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="large">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">权限</label>
                    				<div class="mws-form-item">
                    					<select class="large">
                    						<option>普通管理员</option>
                    						<option>超级管理员</option>
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">爱好</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="checkbox"> <label>打球</label></li>
                    						<li><input type="checkbox"> <label>是啥</label></li>
                    					</ul>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">性别</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio"> <label>男</label></li>
                    						<li><input type="radio"> <label>女</label></li>
                    					</ul>
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
@endsection