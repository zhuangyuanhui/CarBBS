@extends('admin.layout.index')


@section('content')
<div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
    <div id="DataTables_Table_0_length" class="dataTables_length">
     <label>显示<select size="1">
        <option value="10" selected="selected">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>页</label>
    </div>
    <div class="dataTables_filter" id="DataTables_Table_0_filter">
     <label>搜索: <input type="text" /></label>
    </div>
    <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"> 
     
        <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
        </tr>
        <tr>
            <td>Trident</td>
            <td>Internet
                 Explorer 4.0</td>
            <td>Win 95+</td>
            <td>4</td>
            <td>X</td>
        </tr>
        <tr>
            <td>Trident</td>
            <td>InternetExplorer 5.0</td>
            <td>Win 95+</td>
            <td>5</td>
            <td>C</td>
        </tr>
</table>


    <div class="dataTables_info" id="DataTables_Table_0_info">
     Showing 1 to 10 of 57 entries
    </div>
    <div class="dataTables_paginate paging_two_button" id="DataTables_Table_0_paginate">
     <a class="paginate_disabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a>
     <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a>
    </div>
   </div> 
  </div>

@endsection