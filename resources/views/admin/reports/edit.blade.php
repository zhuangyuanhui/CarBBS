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
                <span><i class="icon-table"></i>{{$title or '网站配置修改'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                         <form class="mws-form" action="/admin/reports/{{$data->id}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT')}}
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">举报人</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="users_id" disabled required value="{{$data->getUsers->uname}}">
                                        </div>
                                   </div>
                                </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">被举报人</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="inform_user" disabled required value="{{$data->getInformUsers->uname}}">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">举报信息</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="content" disabled value="{{$data->content}}" placeholder="">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">举报时间</label>
                                        <div class="mws-form-item">
                                            
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                <div class="mws-form-row" >
                                      <label class="mws-form-label">审核状态</label>
                                      <div class="mws-form-item">
                                        待审核 :<input type="radio" name="status" value="1" @if($data->status == '1') checked @endif>
                                        同意 :<input type="radio"  name="status" onclick="fenghao()" value="2" @if($data->status == '2') checked @endif>
                                        驳回 :<input type="radio" name="status" value="3" @if($data->status == '3') checked @endif>
                                       </div>
                                  </div>
                              </div>
                              <div class="mws-form-inline" id="fenghao_div" style="display: none">
                                  <div class="mws-form-row" >
                                        <label class="mws-form-label">用户状态</label>
                                        <div class="mws-form-item">
                                          永久封号:<input type="radio" name='users_status'  value="2" >
                                          临时封号:<input type="radio" name='users_status' onclick="shijian()"  value="3">
                                         </div>
                                      </div>
                                </div>
                                <div class="mws-form-row" id="shijian" style="display: none;width:970px">
                                  <label class="mws-form-label">封号时间</label>
                                  <div class="mws-form-item">
                                    <select class="large" name="seal_time">
                                      <option value="1"  >3天</option>
                                      <option value="1"  >7天</option>
                                      <option value="1"  >30天</option>
                                      <option value="2"  >180天</option>
                                      <option value="3"  >365天</option>
                                    </select>
                                  </div>
                                </div>
                              <div class="mws-button-row">
                                   <input type="submit" value="审核提交" class="btn btn-danger">
                                   <input type="reset" value="重置" class="btn ">
                              </div>
                         </form>
                    </div>         
                </div>
                <script type="text/javascript">
                      function fenghao()
                      {
                         $('#fenghao_div').css('display','block');
                      }

                       function shijian ()
                      {
                         $('#shijian').css('display','block');
                      }
                </script>
@endsection