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
                <span><i class="icon-table"></i>{{$title or '发送私信'}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                         <form class="mws-form" action="/admin/husers/sendall" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">私信内容</label>
                                        <div class="mws-form-item">
                                        <textarea style="width: 750px;height: 400px;" name="content"></textarea>
                                        </div>
                                   </div>

                                   <div class="picList mws-form-row">
                                  </div>
                              </div>
                              <div class="mws-button-row">
                                   <input type="submit" value="确认群发" class="btn btn-danger">
                                   <input type="reset" value="重置" class="btn ">
                              </div>
                         </form>
                    </div>         
                </div>
@endsection