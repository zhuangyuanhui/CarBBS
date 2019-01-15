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
                    <form action="/admin/comment" method="get">
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                     <label>显示
                        <select size="1" name="search_count" style="width: 150px;">
                            <option value="5" @if(isset($params['search_count']) && $params['search_count'] == 5  ) selected @endif>5</option>
                            <option value="10"@if(isset($params['search_count']) && $params['search_count'] == 10 ) selected @endif>10</option>
                            <option value="20"@if(isset($params['search_count']) && $params['search_count'] == 20 ) selected @endif>20</option>
                            <option value="50"@if(isset($params['search_count']) && $params['search_count'] == 50 ) selected @endif>50</option>
                        </select>
                     页
                   </label>
                    </div>
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                     <label>类型
                        <select size="1" name="search_type" style="width: 200px;">
                            <option value="0" @if(isset($params['search_type']) && $params['search_type'] == 0  ) selected @endif>全部</option>
                            <option value="1"@if(isset($params['search_type']) && $params['search_type'] == 1 ) selected @endif>文章</option>
                            <option value="2"@if(isset($params['search_type']) && $params['search_type'] == 2 ) selected @endif>新闻</option>
                        </select>
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
                                    <th>评论人</th>
                                    <th>被评论文章</th>
                                    <th>文章类型</th>
                                    <th>评论内容</th>
                                    <th>评论时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($comment as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->getUsers->uname }}</td>
                                    <td>{{ $v->getArticle->title }}</td>
                                    <td>个人文章</td>
                                    <td>{{ $v->content }}</td>
                                    <td>{{date('Y-m-d H:i:s',$v->ctime)}}</td>
                                    <td>
                                    	<form action="/admin/comment/{{$v->id}}" method="post" style="display: inline-block;" >
                                    		{{ csrf_field() }}
                                    		{{ method_field('DELETE') }}
                                            <input type="hidden" name="type" value="article">
                                    		<input type="submit" value="删除" onclick="return confirm('确定要删除吗?')" class="btn btn-danger">
                                    	</form>
                                        <a href="/admin/husers/{{$v->getUsers->id}}/edit" class="btn btn-warning">管理用户</a>
                                    </td>
                                </tr>
                                @endforeach
                                 @foreach($new_comment as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->getUsers->uname }}</td>
                                    <td>{{ $v->getNews->title }}</td> 
                                    <td>新闻</td>
                                    <td>{{ $v->content }}</td>
                                    <td>{{date('Y-m-d H:i:s',$v->ctime)}}</td>
                                    <td>
                                        <form action="/admin/comment/{{$v->id}}" method="post" style="display: inline-block;" >
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="type" value="news">
                                            <input type="submit" value="删除" onclick="return confirm('确定要删除吗?')" class="btn btn-danger">
                                        </form>
                                         <a href="/admin/husers/{{$v->getUsers->id}}/edit" class="btn btn-warning">管理用户</a>
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