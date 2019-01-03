@extends('admin.layout.index')

@section('content')
                 <div class="mws-panel grid_8">
                    <div class="mws-panel-header" style="height:50px">
                         <span><i class="icon-table"></i>{{$title or 后台云标签列表}}</span>
                    </div>
                <div class="mws-panel-body no-padding"> 
                   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                    <form action="/admin/label" method="get">
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                     <label>显示
                        <select size="1" name="search_count">
                            <option value="2" @if(isset($params['search_count']) && $params['search_count'] == 2  ) selected @endif>2</option>
                            <option value="10"@if(isset($params['search_count']) && $params['search_count'] == 10 ) selected @endif>10</option>
                            <option value="20"@if(isset($params['search_count']) && $params['search_count'] == 20 ) selected @endif>20</option>
                            <option value="50"@if(isset($params['search_count']) && $params['search_count'] == 50 ) selected @endif>50</option>
                        </select>
                     页
                   </label>
                    </div>
                    <div class="dataTables_filter" id="DataTables_Table_0_filter">
                     <label>搜索: 
                        <input type="text" name="search_uname" value="{{$params['search_uname'] or ''}}">
                        <input type="submit" value="搜索">
                     </label>
                    </div>
                    </form>

                        <table class="mws-datatable-fn mws-table">
                                <tr>
                                    <th>ID</th>
                                    <th>分类</th>
                                    <th>标签名</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($label as $k=>$v)
                                    <tr style="text-align:center">
                                        <td>{{ $v->id }}</td>
                                        <td>{{ $v->getCates->cname }}</td>
                                        <td>{{ $v->lname }}</td>
                                        <td>
                                            <form style="display: inline-block;" method="post" action="/admin/label/{{ $v->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="删除" onclick="return confirm('确定要删除吗')"  class="btn btn-danger">
                                            </form>
                                            <a href="/admin/label/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div id="pages_pages"></div>
                        {{ $label->appends($params)->links() }}
                    </div>
                    </div>
                 
                </div>

@endsection