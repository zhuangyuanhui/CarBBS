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
                <span><i class="icon-table"></i>{{$title or '用户举报管理'}}</span>
            </div>
            <div class="mws-panel-body no-padding"> 
                   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                    <form action="/admin/reports" method="get">
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
                                    <th>举报人</th>
                                    <th>被举报人</th>
                                    <th>描述</th>
                                    <th>类型</th>
                                    <th>举报时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($reports as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->getUsers->uname }}</td>
                                    <td>{{ $v->getInformUsers->uname }}</td>
                                    <td>{{ $v->content }}</td>
                                     @switch($v->type)
                                            @case(1)
                                                <td>其它</td>
                                                @break

                                            @case(2)
                                                <td>个人资料</td>
                                                @break

                                            @case(3)
                                                <td>文章</td>
                                                @break

                                            @case(4)
                                                <td>评论</td>
                                                @break

                                            @default
                                                <td>私信</td>
                                        @endswitch
                                    <td>{{ $v->ctime }}</td>
                                    @if($v->status == 1)
                                    <td>未审核</td>
                                    @elseif($v->status == 2)
                                    <td>已同意</td>
                                    @elseif($v->status == 3)
                                    <td>已驳回</td>
                                    @endif
                                    <td>
                                        <a href="/admin/reports/{{$v->id}}/edit" class="btn btn-warning">审核</a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                        <div id="pages_pages">
                        </div>
                    </div>
                    </div>
                    </div>
@endsection