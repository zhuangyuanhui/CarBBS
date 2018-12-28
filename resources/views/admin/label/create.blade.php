@extends('admin.layout.index')

@section('content')
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header" style="height:50px">
                    	<span>{{$title or '云标签添加'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/label" method="post">
                              {{ csrf_field() }}
                    		<div class="mws-form-inline" >
                    			<div class="mws-form-row" style="width:960px">
                    				<label class="mws-form-label">类别</label>
                    				<div class="mws-form-item">
                    					<select class="large" name="cates">
                                            @foreach ($data as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->cname}}</option>
                                            @endforeach               
                                        </select>
                    				</div>
                    			</div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">云标签</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" name="lname" required>
                                    </div>
                                </div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="添加" class="btn btn-success">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection