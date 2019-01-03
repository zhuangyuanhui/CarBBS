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
                        <span>{{ $title or '后台车模修改'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/girls/{{$girls->id}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT')}}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">车模标题</label>
                                    <div class="mws-form-item" style="width:1400px">
                                        <input type="text" class="small" name="title" required value="{{ $girls->title }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                        <label class="mws-form-label">车模内容</label>
                                        <div class="mws-form-item">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" style="width:770px;height:400px" name="content" type="text/plain">
                                         {!! $girls->content !!}
                                        </script>
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">车模配图</label>
                                        <div class="mws-form-item" style="width:770px">
                                        <input type="file" class="small" name="profiles" onchange="preview(this)" placeholder="请选择图片上传">
                                        </div>
                                   </div>
                                   <div class="picList mws-form-row">

                                      <img src="/uploads/{{$girls->car_pic}}" style="height:120px;width:120px;margin:4px;border-radius:60px 60px">

                                  </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-warning">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>

               <!-- 配置文件 -->
              <script type="text/javascript" src="/admin/utf8-php/ueditor.config.js"></script>
              <!-- 编辑器源码文件 -->
              <script type="text/javascript" src="/admin/utf8-php/ueditor.all.js"></script>
              <!-- 实例化编辑器 -->
              <script type="text/javascript">
                  var ue = UE.getEditor('container',{toolbars: [
                                       ['fullscreen', 'source', 'undo', 'redo'],
                                       ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist','insertunorderedlist', 'selectall', 'cleardoc']
                                   ]});

                  //上传前图片预览
                  function preview(obj){
                    console.log(window.URL.createObjectURL(obj.files[0]));
                   var length = obj.files.length;
                   //多图上传时遍历文件信息（可以通过object.files查看）
                   for (var i = 0; i < length; i++) {//循环输出预览图片
                    $('.picList').append('<img src="'+window.URL.createObjectURL(obj.files[i])+'" style="height:120px;width:120px;margin:4px;border-radius:60px 60px"/>');
                    }
                   }
                  
              </script>
@endsection