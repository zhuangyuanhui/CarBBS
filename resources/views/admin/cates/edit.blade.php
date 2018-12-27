@extends('admin.layout.index')

@section('content')
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header" style="height:50px">
                <span><i class="icon-table"></i>{{$title or '后台类别修改'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/cates/{{$edit->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">类 别</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="cname" value="{{$edit->cname}}" required>
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
@endsection