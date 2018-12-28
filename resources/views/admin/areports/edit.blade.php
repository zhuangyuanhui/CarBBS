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
                <span><i class="icon-table"></i>{{$title or '审核举报信息'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                         <form class="mws-form" action="/admin/areports/{{$edit->id}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT')}}
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">举报人</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="" value="{{$edit->userarticles->uname}}" readonly>
                                        </div>
                                   </div>
                              </div>
                              
                         
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">举报原因</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="content" value="{{$edit->content }}" disabled>
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">举报时间</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="ctime" value="{{date('Y-m-d H:i:s',$edit->ctime)}}" readonly>
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">违规类型</label>
                                        <div class="mws-form-item">
                                        <label for="sh" class="radio_label">
                                        <select size="1" name="type" style="width: 110px">
                                          <option value="1" @if($edit->type==1) selected @endif>其它</option> 
                                          <option value="2" @if($edit->type==2) selected @endif>低俗色情</option>
                                          <option value="3" @if($edit->type==3) selected @endif>政治敏感</option>
                                          <option value="4" @if($edit->type==4) selected @endif>内容重复</option>
                                          <option value="5" @if($edit->type==5) selected @endif>攻击歧视</option>
                                          <option value="6" @if($edit->type==6) selected @endif>血腥暴力</option>
                                        </select>
                                        </label> 
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">审核状态</label>
                                        <div class="mws-form-item">
                                        <label for="sh" class="radio_label">
                                          待审核 <input type="radio" name="status" id="sh" value="1" @if($edit->status==1) checked @endif>
                                          同意 <input type="radio" name="status" id="sh" value="2" @if($edit->status==2) checked @endif> 
                                          驳回 <input type="radio" name="status" id="sh" value="3" @if($edit->status==3) checked @endif>  
                                        </label> 
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