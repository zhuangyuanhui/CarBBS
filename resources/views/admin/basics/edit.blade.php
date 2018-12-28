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
                         <form class="mws-form" action="/admin/basics/{{$edit->id}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT')}}
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">网站名称</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="name" required value="{{$edit->name}}">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">电话</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="tel" required value="{{ $edit->tel }}">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">网站备案号</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="record_number" required value="{{$edit->record_number }}" placeholder="例:鲁ICP备*******号">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">版权信息</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="copyright" required value="{{ $edit->copyright }}" placeholder="例:Copyright © 2018 CarBBS AllRightsReserved.">
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-form-row">
                                        <label class="mws-form-label">网站描述</label>
                                        <div class="mws-form-item">
                                        <textarea name="desc" id="" cols="100" rows="6" >{{ $edit->desc }}</textarea>
                                        </div>
                              </div>
                               <div class="mws-form-row">
                                    <label class="mws-form-label">网站Logo</label>
                                    <div class="mws-form-item" style="width: 800px">
                                    <input type="file" class="small" name="logo" onchange="preview(this)" placeholder="请选择logo上传">
                                    </div>
                               </div>
                                  <div class="picList mws-form-row">
                                    <div>
                                      <img src="/uploads/{{$edit->logo}}" alt="原图" width="200px" height="200px">
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
              // 上传图片前预 览
                  function preview(obj){
                   var length = obj.files.length;
                   //多图上传时遍历文件信息（可以通过object.files查看）
                   for (var i = 0; i < length; i++) {//循环输出预览图片
                    $('.picList').append('<img src="'+window.URL.createObjectURL(obj.files[i])+'" style="width:200px;margin:4px"/>');
                    }
                   }
                  
              </script>
@endsection