@extends('home.layout.personal')
@section('content')
   <div id="ct" class="ct1 wp cl" > 
        <!-- 用户被重定向后，你可以从 session 中显示闪存消息 -->
        @if (session('error'))
            <div class="mws-form-message error">
                {{ session('error') }}
            </div>
        @endif        


        @if (session('success'))
            <div class="mws-form-message success">
                {{ session('success') }}
            </div>
        @endif
        <!-- 用户被重定向后，你可以从 session 中显示闪存消息 -->
         <div style="margin-left: 150px;">
           <form action="/home/personal/report_store" id="articles_info" method="post" >
              {{ csrf_field() }}
              <input type="hidden" name="users_id" value="{{$users->id}}">
            <div class="form-group">
              <label for="exampleInputEmail1">举报类型</label>
              <select class="form-control" name="type" style="width: 770px;">
                      <option value="1">其他类型</option>
                      <option value="2">个人资料违规</option>
                      <option value="3">文章违规</option>
                      <option value="4">评论违规</option>
                      <option value="5">私信违规</option>
              </select>
            </div>
          <div class="form-group">
            <label for="exampleInputPassword1">举报内容</label>
            <br>
            <textarea style="width: 770px;height: 200px;" name="content"></textarea>
          </div>
          <button type="submit"  style="width: 770px;" class="btn btn-success">确认举报</button>

        </form>

@endsection