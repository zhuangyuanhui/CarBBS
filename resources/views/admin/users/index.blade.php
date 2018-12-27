@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header" style="height:50px">
        <span>{{ $title }}</span>
    </div>
<div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/admin/users">
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
                <th>ID</th>
                <th>用户头像</th>
                <th>用户名</th>
                <th>邮箱</th>
                <th>手机号</th>
                <th>注册时间</th>
                <th>操作</th>
            </tr>
            @foreach($data as $k => $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>
                    <img src="/uploads/{{ $v->users_pic }}" style="width: 100px;height: 100px;">
                </td>
                <td>{{ $v->uname }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->tel }}</td>
                <td>{{ $v->ctime }}</td>
                <td>
                    <form action="/admin/users/{{ $v->id }}" method="post" style="display: inline">
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="删除" onclick="return confirm('确认删除??')" name="" class="btn btn-danger">
                        
                    </form>
                    <a href="/admin/users/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="dataTables_info" id="DataTables_Table_0_info">
     Car BBS
    </div>
    <div class="dataTables_paginate paging_two_button" >{{ $data->appends($params)->links() }}
     <a class="paginate_disabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a>
     <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a>
    </div>
   </div> 
  </div>
@endsection