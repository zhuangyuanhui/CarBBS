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
                <span><i class="icon-table"></i>{{$title or '后台新闻 列表'}}</span>
            </div>
            <div class="mws-panel-body no-padding"> 
                   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                    <form action="/admin/news" method="get">
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                     <label>显示
                        <select size="1" name="search_count">
                            <option value="5" @if(isset($params['search_count']) && $params['search_count'] == 5  ) selected @endif>5</option>
                            <option value="10"@if(isset($params['search_count']) && $params['search_count'] == 10 ) selected @endif>10</option>
                            <option value="20"@if(isset($params['search_count']) && $params['search_count'] == 20 ) selected @endif>20</option>
                            <option value="50"@if(isset($params['search_count']) && $params['search_count'] == 50 ) selected @endif>50</option>
                        </select>
                     页
                   </label>
                    </div>
                    <div class="dataTables_filter" id="DataTables_Table_0_filter">
                     <label>搜索: 
                        <input type="text" name="search_title" value="{{$params['res'] or ''}}">
                        <input type="submit" name="" value="搜索">
                     </label>
                    </div>
                    </form>

                        <table class="mws-datatable-fn mws-table">
                                <tr>
                                    <th>ID</th>
                                    <th>新闻标题</th>
                                    <th>新闻类别</th>
                                    <th>发表时间</th>
                                    <th>点击量</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($news as $k=>$v)
                                    <tr style="text-align:center">
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->title}}</td>
	                                    <td>{{$v->newcates->cname}}</td>
                                        <td>{{date('Y-m-d H:i:s',$v->ctime)}}</td>
                                        <td>{{$v->clicks}}</td>
                                        <td>
                                            <form style="display: inline-block;" method="post" action="/admin/news/{{ $v->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="删除"  class="btn btn-danger" onclick="return confirm('确定要删除么?')">
                                            </form>
                                            <a href="/admin/news/{{ $v->id }}/edit" class="btn btn-success">修改</a>
                                            <a href="javascript:;" class="btn btn-success" onclick="shows({{ $v->id}})">查看内容</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div id="pages_pages"></div>
                        {{ $news->appends($params)->links() }}
                    </div>
                    </div>
                    </div>
                    <script type="text/javascript">
                        function shows(id) {
                            var url = '/admin/news/'+ id;  
                            $.get(url,{'id':id},function(data){
                                 if(data.code != 'error'){
                                    console.log(data);
                                    // 修改模态框的值 并且显示
                                    $('#myModal h4').eq(0).html(data.title);
                                    $('#myModal .modal-body').html(data.content);
                                    // 显示模态框
                                     $('#myModal').modal('show');
                                }
                            },'json');
                        }
                    </script>   
                         <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">新闻详情</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                    </div>
                  </div>
                </div>
@endsection