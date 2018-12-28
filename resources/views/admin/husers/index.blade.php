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
                <span><i class="icon-table"></i>{{$title or '后台网站列表'}}</span>
            </div>
            <div class="mws-panel-body no-padding"> 
                   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                    <form action="/admin/husers" method="get">
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
                        <input type="text" name="search_name" value="{{$params['search_name'] or ''}}">
                        <input type="submit" name="" value="搜索">
                     </label>
                    </div>
                    </form>

                        <table class="mws-datatable-fn mws-table">
                                <tr>
                                    <th>ID</th>
                                    <th>用户名称</th>
                                    <th>用户头像</th>
                                    <th>用户手机</th>
                                    <th>用户状态</th>
                                    <th>用户积分</th>
                                    <th>连续签到天数</th>
                                    <th>用户创建时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->uname }}</td>
                                    <td></td>
                                    <td>{{ $value->tel }}</td>
                                    @if($value->status == 1)
                                    <td>已激活</td>
                                    @elseif($value->status == 2)
                                    <td>已永久封号</td>
                                    @elseif($value->status == 3)
                                    <td>已临时封号</td>
                                    @endif
                                    <td>{{ $value->getUserInfo->sign_number }}</td>
                                    <td>{{ $value->getUserInfo->sign_days }}</td>
                                    <td>{{date('Y-m-d H:i:s',$value->ctime) }}</td>
                                    <td>
                                        <a href="/admin/husers/{{ $value->id }}/edit" class="btn btn-warning">管理</a>
                                        <a href="#" onclick="shows({{ $value->id }})" class="btn btn-success">查看详情</a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                        <div id="pages_pages">
                            {{ $data->appends('params')->links() }}
                        </div>
                    </div>
                    </div>
                    </div>
                    <script type="text/javascript">
                        function shows(id) {
                            var url = '/admin/husers/'+ id;  
                            $.get(url,{'id':id},function(data){
                                 if(data.code != 'error'){
                                    console.log(data);
                                    // 修改模态框的值 并且显 示
                                    $('#myModal h4').eq(0).html(data.uname);
                                    var str = '<p>性别 : &nbsp;&nbsp;&nbsp;'+ 
                                                    data.info.sex +'</p><br><p>年龄: &nbsp;&nbsp;&nbsp;'+
                                                    data.info.age +'</p><br><p>邮箱: &nbsp;&nbsp;&nbsp;'+
                                                    data.info.email +'</p><br><p>地区: &nbsp;&nbsp;&nbsp;'+
                                                    data.info.addr +'</p><br><p>简介: &nbsp;&nbsp;&nbsp;'+
                                                    data.info.intro;
                                    $('#myModal .modal-body').html(str);
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
                        <h4 class="modal-title" id="myModalLabel">网站详情</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                    </div>
                  </div>
                </div>
@endsection