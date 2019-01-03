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
                <span><i class="icon-table"></i>{{$title or '新闻 添加'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                         <form class="mws-form" action="/admin/news" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">新闻分类</label>
                                        <div class="mws-form-item">
                                            <select class="form-control" id="pid" name="cates_id" style="width: 585px">
                                                  
                                                  @foreach($data as $k=>$v)
                                                  <option value="{{ $v->id }}" {{ $id == $v->id ? 'selected' : '' }}>{{ $v->cname }}</option>
                                                  @endforeach
                                        </select>
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">新闻标题</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="title" required value="{{ old('title') }}">
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">新闻内容</label>
                                        <div class="mws-form-item">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" style="width:770px;height:400px" name="content" type="text/plain"></script>
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">新闻封面</label>
                                        <div class="mws-form-item" style="width:150px;display: none">
                                        <input type="file" id="news_pic" multiple class="small" name="news_pic[]" onchange="preview(this)" placeholder="请选择图片上传">
                                        </div>
                                        <label for="news_pic"><div id="preview" style="width:150px;height: 150px;background: url(/admin/images/jia.jpg);"></div></label>
                                   </div>

                                  <!-- <div class="mws-form-row">
                                        <label class="mws-form-label">上传头像</label>
                                        <div class="mws-form-item" style="width:150px;display: none">
                                            <input type="file" onchange="preview(this)"  multiple class="small" name="profiles" id="profiles">
                                        </div>
                                         <label for="profiles"><div id="preview" style="width:150px;height: 150px;background: url(/admin/images/jia.jpg);"></div></label>
                                   </div> -->

                                    




                                   <div class="picList mws-form-row">
                                        
                                  </div>
                              </div>
                              <div class="mws-button-row">
                                   <input type="submit" value="添加" class="btn btn-danger">
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

                  上传前图片预览
                  function preview(obj){
                   var length = obj.files.length;
                   //多图上传时遍历文件信息（可以通过object.files查看）
                   for (var i = 0; i < length; i++) {//循环输出预览图片
                    $('.picList').append('<img src="'+window.URL.createObjectURL(obj.files[i])+'" style="width:200px;margin:4px"/>');
                    }
                   }
                  
              </script>
@endsection