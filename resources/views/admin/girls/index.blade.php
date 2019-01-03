@extends('admin.layout.index')

@section('content')
               <div class="mws-panel grid_8">
                    <div class="mws-panel-header" style="height:50px">
                         <span><i class="icon-table"></i>{{$title or 后台车模列表}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div class="mws-panel-body no-padding">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">

                            <form action="/admin/girls" action="get">
                                <div id="DataTables_Table_0_length" class="dataTables_length">
                                 <label>显示
                                    <select size="1" name="search_count">
                                        <option value="2" @if(isset($params['search_count']) && $params['search_count'] == 2  ) selected @endif>2</option>
                                        <option value="10"@if(isset($params['search_count']) && $params['search_count'] == 10 ) selected @endif>25</option>
                                        <option value="20"@if(isset($params['search_count']) && $params['search_count'] == 20 ) selected @endif>50</option>
                                        <option value="50"@if(isset($params['search_count']) && $params['search_count'] == 50 ) selected @endif>100</option>
                                    </select>
                                 页
                               </label>
                                </div>
                                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                 <label>标题关键字: <input type="text" name="title" value="{{$params['title'] or ''}}" />
                                                <input type="submit" value="搜索">
                                 </label>
                                </div>
                            </form>

                            <table class="mws-datatable-fn mws-table">
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>点击量</th>
                                    <th>发表时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->clicks}}</td>
                                    <td>{{date('Y-m-d H:i:s',$value->ctime)}}</td>
                                   <td>
                                       <form style="display: inline-block;" method="post" action="/admin/girls/{{ $value->id }}">
                                        
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="删除" onclick="return confirm('确定要删除吗?')" class="btn btn-danger">
                                            </form>                                      
                                        <a href="/admin/girls/{{$value->id}}/edit" class="btn btn-warning">修改</a>
                                        <a href="javascript:;" class="btn btn-success" onclick="shows({{$value->id}})">查看信息</a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>                     
                        <div class="pages_pages">
                            {{$data->appends('params')->links()}}
                        </div>
                       
                      </div class="dataTables_info" id="DataTables_Table_1_info">
                     </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function shows(id){
                        var url = '/admin/girls/'+ id ;
                        $.get(url,{'id':id},function(data){
                            if(data.code != 'error'){
                                console.log(data.car_pic);
                                var str = '';
                                $(data.car_pic).each(function(key,val){
                                    $('picList').append('<img src="/uploads/"'+ val + '/>');
                              });

                                // 修改模态框的值 并且显示
                                $('#myModal h4').eq(0).html(data.title);
                                $('#myModal .modal-body').html(data.content);
                                // 显示模态框
                                 $('#myModal').modal('show')
                            }
                        },'json');
                    }

                </script>

                <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">车模管理列表</h4>
                      </div>
                      <div class="modal-body">
                        <div class="picList mws-form-row">

                         </div>
                      </div>
                    </div>
                  </div>
                </div>
@endsection