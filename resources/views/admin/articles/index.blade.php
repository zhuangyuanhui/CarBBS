@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header" style="height:50px">
        <span>{{ $title }}</span>
    </div>
<div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/admin/articles">
    <div id="DataTables_Table_0_length" class="dataTables_length">
     <label>显示
        <select size="1" id="search_count" name="search_count">
            <option value="1" @if(isset($params['search_count']) && $params['search_count'] == 1  ) selected @endif>1</option>
            <option value="10"@if(isset($params['search_count']) && $params['search_count'] == 10 ) selected @endif>10</option>
            <option value="20"@if(isset($params['search_count']) && $params['search_count'] == 20 ) selected @endif>20</option>
            <option value="50"@if(isset($params['search_count']) && $params['search_count'] == 50 ) selected @endif>50</option>
        </select>
     页
   </label>
    </div>
    <div class="dataTables_filter" id="DataTables_Table_0_filter">
     <label>搜索: 
        <input type="text" name="search_uname" value="{{ $params['search_uname'] or '' }}">
        <input type="submit" name="" value="搜索">
     </label>
    </div>
    </form>
   <table class="mws-datatable-fn mws-table">
            <tr>
                <td>ID</td>
                <td>作者</td>
                <td>文章标题</td>
                <td>文章分类</td>
                <td>文章创建时间</td>
                <td>文章状态</td>
                <td>操作</td>
            </tr>
            @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->title }}</td>
                <td>{{ $v->getName->uname }}</td>
                <td>{{ $v->getCate->cname }}</td>
                <td>
                   {{ date('Y - m -d H:i:s', $v->ctime ) }}
                </td>
                <td>
                    @if($v->article_status == 1)
                    热文
                    @elseif($v->article_status == 2)
                    新文
                    @elseif($v->article_status == 1)
                    普通
                    @endif
                <td>
                    <form action="/admin/articles/{{ $v->id }}" method="post" style="display: inline">
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="删除" onclick="return confirm('确认删除??')" name="" class="btn btn-danger">
                        
                    </form>
                    <a href="javascript:;" class="btn btn-success" onclick="shows( {{ $v->id }} )">查看详情</a>
                </td>
            </tr>

                <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">文章详情  </h4>
                      </div>
                      <div class="modal-body">
                        <div class="picList mws-form-row">

                            文章内容:
                                   {!! $v->content !!}
                                   @foreach($pic as $key => $value)
                                        <img src="/uploads/{{ $value }}">
                                   @endforeach
                                   <h3>
                                       <i class="icol32-tab-go"></i>{{ $v->transmit }} &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;      
                                       <i class="icol32-select"></i>{{ $v->clicks }}&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     
                                       <i class="icol32-thumb-up"></i>{{ $v->praise }} &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
                                       <i class="icol32-thumb-down"></i>{{ $v->trample }}
                                   </h3>

                         </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
    </table>
    <div class="dataTables_info" id="DataTables_Table_0_info">
     Car BBS
    </div>
     <a class="paginate_disabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a>
     <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a>
    </div>
   </div> 
  </div>

  <!-- 绑定模态框 -->

                  <script type="text/javascript">
                    function shows(id){
                                // 显示模态框
                                 $('#myModal').modal('show')
                            }

                </script>

@endsection