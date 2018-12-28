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
                         <form class="mws-form" action="/admin/husers/{{$husers->id}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT')}}
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户名</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="uname" disabled required value="{{$husers->uname}}">
                                        </div>
                                   </div>
                                </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户头像</label>
                                        <div class="mws-form-item">
                                             <img src="">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">手机</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="tel" disabled value="{{$husers->tel}}" placeholder="">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">创建时间</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="ctime" disabled value="{{date('Y-m-d H:i:s',$husers->ctime) }}" placeholder="">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">连续签到天数</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="sign_days"  value="{{$husers->getUserInfo->sign_days}}" placeholder="">
                                        </div>
                                   </div>
                              </div>   
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户积分</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="sign_number"  value="{{$husers->getUserInfo->sign_number}}" placeholder="">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                              <div class="mws-form-row" >
                                    <label class="mws-form-label">用户状态</label>
                                    <div class="mws-form-item">
                                      启用:    <input type="radio" name='status' value="1" @if($husers->status == '1') checked @endif>
                                      永久封号:<input type="radio" name='status' value="2" @if($husers->status == '2') checked @endif>
                                      临时封号:<input type="radio" name='status' onclick="fenghao()" value="3" @if($husers->status == '3') checked @endif>
                                     </div>
                                  </div>
                                </div>
                                <div class="mws-form-row" id="fenghao_div" style="display: none;width:970px">
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
                                   <input type="submit" value="提交审核" class="btn btn-danger">
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
                </script>
@endsection