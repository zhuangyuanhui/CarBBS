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
                <span><i class="icon-table"></i>{{$title or '后台类别列表'}}</span>
            </div>
            <div class="mws-panel-body no-padding"> 
                   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                    <form action="/admin/cates" method="get">
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                     <label>显 示
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
                        <input type="text" name="search_cname" value="{{$params['res'] or ''}}">
                        <input type="submit" name="" value="搜索">
                     </label>
                    </div>
                    </form>

                        <table class="mws-datatable-fn mws-table">
                                <tr>
                                    <th>ID</th>
                                    <th>类别</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($data as $k=>$v)
                                    <tr style="text-align:center">
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->cname}}</td>
                                        <td>
                                            <form style="display: inline-block;" method="post" action="/admin/cates/{{ $v->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="删除"  class="btn btn-danger" onclick="return confirm('确定要删除么?')">
                                            </form>
                                            <a href="/admin/cates/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div id="pages_pages"></div>
                        {{ $data->appends($params)->links() }}
                    </div>
                    </div>
                    </div>
@endsection