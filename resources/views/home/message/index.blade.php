@extends('home.layout.index')
@section('content')
<!-- 需要引进的文件 -->
  <script type="text/javascript" src="/home/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="/home/bootstrap-3.3.7-dist/css/bootstrap.css" />

<div id="wp" class="wp time_wp cl"><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页">玩车达人</a> <em>›</em>
<span>通知</span> <em>›</em>
<a href="javascript:;">消息</a>
</div>
</div>

<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><img alt="pm" src="static/image/feed/pm.gif" class="vm"> 消息</h1>
<ul class="tb cl">
</ul>
<!-- 用户收件 -->
@if($type == 1)
@foreach($data as $k =>$v)
        <div class="xld xlda pml mtm mbm">
                <dl id="pmlist_1" class="bbda cur1 cl">                                 
                    <dd class="m avt">
                        <div class="o">
                            <input type="checkbox" name="deletepm_deluid[]" id="a_delete_1" class="pc" value="{{ $v->id }}">
                        </div>
                        <div class="newpm_avt" title="有未读消息"></div>
                        <a href="/home/personal/index/{{ $v->user->id }}" target="_blank"><img src="/uploads/{{ $v->user->getUserInfo->face }}"></a>
                    </dd>
                <dd class="ptm pm_c">
                     @if($v->status == 2)
                    <span style="margin-left: 745px;color: #ccc">已读</span> 
                    @endif
                    <a href="/home/personal/index/{{ $v->user->id }}" target="_blank">{{ $v->user->uname }}</a>  :<br>
                     &nbsp;  <br>
                    <span class="xg1"><span title="2019-1-8 16:05">{{ date('Y - m -d H:i:s',$v->send_time) }}</span></span> &nbsp; 
                    <span class="pm_o y">
                        <a href="javascript:;" ><span class="sdelete" onclick="sdelete(this)">删除</span><span style="display: none;">{{ $v->id }}</span></a>
                        <a href="javascript:;" ><span class="reply" onclick="shows({{ $v->user->id }})">回复</span></a>
                        <a href="javascript:;" >
                            <span class="look" onclick="look(this)">查看</span>
                            <span style="display: none;">{{ $v->user->id }}</span>
                            <span style="display: none;">{{ $v->user->uname }}</span>
                            <span style="display: none;">{{ $v->message_content }}</span>
                            <span style="display: none;">{{ $v->id }}</span>
                            <span style="display: none;">{{ $type }}</span>
                            <span style="display: none;">{{ $v->status }}</span>
                        </a>
                    </span>
                </dd>
                </dl>
        </div>
    @endforeach
<!-- 用户发件 -->
@elseif($type == 2)
    @foreach($data as $k =>$v)
        <div class="xld xlda pml mtm mbm">
                <dl id="pmlist_1" class="bbda cur1 cl">                                 
                    <dd class="m avt">
                        <div class="o">
                            <input type="checkbox" name="deletepm_deluid[]" id="a_delete_1" class="pc" value="{{ $v->id }}">
                        </div>
                        <a href="/home/personal/index/{{ $v->user->id }}" target="_blank"><img src="/uploads/{{ $v->user->getUserInfo->face or 'aaa' }}"></a>
                    </dd>
                <dd class="ptm pm_c">
                   
                    <span class="xi2 xw1">您</span> 发送给 <a href="/home/personal/index/{{ $v->user->id }}" target="_blank">{{ $v->user->uname }}</a>  :<br>
                     &nbsp;  <br>
                    <span class="xg1"><span title="2019-1-8 16:05">{{ date('Y - m -d H:i:s',$v->send_time) }}</span></span> &nbsp;
                    <span class="pm_o y">
                        <a href="javascript:;" ><span class="fdelete"  onclick="fdelete(this)">删除</span><span style="display: none;">{{ $v->id }}</span></a>
                        <a href="javascript:;" >
                            <span class="look" onclick="look(this)">查看</span>
                            <span style="display: none;">{{ $v->user->id }}</span>
                            <span style="display: none;">{{ $v->user->uname }}</span>
                            <span style="display: none;">{{ $v->message_content }}</span>
                            <span style="display: none;">{{ $v->id }}</span>
                            <span style="display: none;">{{ $type }}</span>
                            <span style="display: none;">{{ $v->status }}</span>
                        </a>
                    </span>
                </dd>
                </dl>
        </div>
    @endforeach
<!-- 系统收件 -->
@elseif($type == 3)
        <div class="mn">
                <div class="bm bw0">
                    <h1 class="mt"><img alt="pm" src="static/image/feed/nts.gif" class="vm"> 提醒</h1>
                    <ul class="tb cl">
                    <li class="a"><a href="javascript:;">系统提醒</a></li>
                    </ul>
                    @foreach($data as $k => $v)
                        <div class="xld xlda">
                            <div class="nts">
                                 <div class="o">
                            <input type="checkbox" name="deletepm_deluid[]" id="a_delete_1" class="pc checkbox_check" value="{{ $v->id }}">
                        </div>
                               
                                <dl class="cl " notice="122">
                                    <dd class="m avt mbn">
                                        <img src="/uploads/{{ $v->user->users_pic }}" alt="">
                                    </dd>
                                     @if($v->status == 2)
                                    <span style="margin-left: 745px;color: #ccc">已读</span> 
                                    @endif
                                    <span class="xi2 xw1">管理员</span><a href="/home/personal/index/{{ $v->user->id }}" target="_blank">{{ $v->user->uname }}</a>  :<br>
                                    <dt>
                                        <span class="xg1 xw0"><span title="2019-1-8 14:19">{{ date('Y - m - d H:i:s',$v->send_time) }}</span></span>
                                    </dt>
                                    <div style="margin-left: 650px;">
                                        <a href="javascript:;" ><span class="sdelete" onclick="sdelete(this)">删除</span><span style="display: none;">{{ $v->id }}</span></a>
                                        <a href="javascript:;" ><span class="reply" onclick="shows_system({{ $v->user->id }})">回复</span></a>
                                        <a href="javascript:;" >
                                            <span class="look" onclick="look(this)">查看</span>
                                            <span style="display: none;">{{ $v->user->id }}</span>
                                            <span style="display: none;">{{ $v->user->uname }}</span>
                                            <span style="display: none;">{{ $v->message_content }}</span>
                                            <span style="display: none;">{{ $v->id }}</span>
                                            <span style="display: none;">{{ $type }}</span>
                                            <span style="display: none;">{{ $v->status }}</span>
                                        </a>
                                    </div>
                                    <hr>
                                </dl>


                            </div>

                        </div>
                    @endforeach

                </div>
        </div>
@elseif($type == 4)
        <div class="mn">
                <div class="bm bw0">
                    <h1 class="mt"><img alt="pm" src="static/image/feed/nts.gif" class="vm"> 提醒</h1>
                    <ul class="tb cl">
                    <li class="a"><a href="javascript:;">系统回复</a></li>
                    </ul>
                    @foreach($data as $k => $v)
                        <div class="xld xlda">
                            <div class="nts">
                                 <div class="o">
                            <input type="checkbox" name="deletepm_deluid[]" id="a_delete_1" class="pc" value="{{ $v->id }}">
                        </div>
                               
                                <dl class="cl " notice="122">
                                    <dd class="m avt mbn">
                                        <img src="/uploads/{{ $v->user->users_pic }}" alt="">
                                    </dd>
                                    <span class="xi2 xw1">回复:管理员</span><a href="/home/personal/index/{{ $v->user->id }}" target="_blank">{{ $v->user->uname }}</a>  :<br>
                                    <dt>
                                        <span class="xg1 xw0"><span title="2019-1-8 14:19">{{ date('Y - m - d H:i:s',$v->send_time) }}</span></span>
                                    </dt>
                                    <div style="margin-left: 690px;">
                                    <a href="javascript:;" ><span class="delete" onclick="fdelete(this)">删除</span><span style="display: none;">{{ $v->id }}</span></a>
                                    <a href="javascript:;" >
                                        <span class="look" onclick="look(this)">查看</span>
                                        <span style="display: none;">{{ $v->user->id }}</span>
                                        <span style="display: none;">{{ $v->user->uname }}</span>
                                        <span style="display: none;">{{ $v->message_content }}</span>
                                        <span style="display: none;">{{ $v->id }}</span>
                                        <span style="display: none;">{{ $type }}</span>
                                        <span style="display: none;">{{ $v->status }}</span>
                                    </a>
                                    </div>
                                    <hr>
                                </dl>


                            </div>

                        </div>
                    @endforeach

                </div>
        </div>
@endif
<div style="margin-left: 680px;">{{ $data->links() }}</div>
<script type="text/javascript">
    //删除收件
     function sdelete(obj){
        var id = $(obj).next().html();
        var url = '/home/message/sdelete/'+id;
         $.get(url,{'id':id},function(data){
            if(data.msg == 'success'){
                 $(obj).parent().parent().parent().parent().remove();
            }
        },'json');
    }

    //删除回复
     function fdelete(obj){
        var id = $(obj).next().html();
        var url = '/home/message/fdelete/'+id;
         $.get(url,{'id':id},function(data){
            if(data.msg == 'success'){
                 $(obj).parent().parent().parent().parent().remove();
            }
        },'json');
    }  

    //回复
    function shows($id){
        //传值进入模态框
         $('.message_content').remove();
         $('.message_id').attr('value',$id);
        // 显示模态框
         $('#myModal').modal('show');

    }    

    //回复系统
    function shows_system($id){
        //传值进入模态框
        $('.shows_system_form').attr('action','/home/message/store_system')
         $('.message_content').remove();
         $('.message_id').attr('value',$id);
        // 显示模态框
         $('#myModal').modal('show');

    } 

    //查看详细信息
    function look(obj){
        //查看后,消息变为已读
        var msg_id = $(obj).next().next().next().next().html();
        var type   = $(obj).next().next().next().next().next().html();
        var status = $(obj).next().next().next().next().next().next().html();
        var url = '/home/message/look/'+msg_id;
        $.get(url,{'id':msg_id},function(data){
             console.log(data);
            if(data.msg == 'success'){
                if( type == 1 && status == 1 || type == 3 && status == 1 ){
                    $(obj).parent().parent().parent().prepend('<span style="margin-left: 745px;color: #ccc">已读</span> ');
                }
            } 
        },'json');

        //传值进入模态框
        var id = $(obj).next().html();
        $('.message_id').attr('value',id);
        //获取对方昵称
        var uname = $(obj).next().next().html();
        $('.modal-title').html(uname);

        var content = $(obj).next().next().next().html();
        $('.message_content').html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+content);
        // 显示模态框
         $('#myModal').modal('show');

    }

    //全选
    function checkall(obj){
        $('input:checkbox').attr('checked',true);
    }

    function unchkall(obj){
           // 获取所有被选中的input
            var che = $('input[class=checkbox_check][checked]');
            // 让所有的input 都选中
            $('input[class=checkbox_check][type=checkbox]').attr('checked',true);
            // 让之前选中的反选
            che.attr('checked',false);
            console.log(che);
    }

   
</script>




<div class="pgs pbm cl pm_op">
<label for="delete_all" onclick="checkall(this);">全选</label> &nbsp; 
<label for="delete_all" onclick="unchkall(this);">反选</label> &nbsp; 
<button class="pn" type="submit" name="deletepmsubmit_btn" value="true"><strong>删除</strong></button>
<button class="pn" type="button" name="markreadpm_btn" value="true" onclick="setpmstatus(this.form);"><strong>标记已读</strong></button>
</div>
<input type="hidden" name="deletesubmit" value="true">
<input type="hidden" name="formhash" value="0408893d">
<script type="text/javascript">addBlockLink('deletepmform', 'dl');</script>

</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">通知</h2>
@if($type == 1)
    <ul id="message">
        <li class="a"><em class="notice_pm"></em><a href="/home/message">收件箱 </a></li>
        <li><em class="notice_pm"></em><a href="/home/message/send">发件箱</a></li>
        <li><em class="notice_system"></em><a href="/home/message/system">系统提醒</a></li>
        <li><em class="notice_system"></em><a href="/home/message/send_system">系统回复</a></li>
    </ul>
@elseif($type == 2)
    <ul id="message">
        <li><em class="notice_pm"></em><a href="/home/message">收件箱 </a></li>
        <li class="a"><em class="notice_pm"></em><a href="/home/message/send">发件箱</a></li>
        <li><em class="notice_system"></em><a href="/home/message/system">系统提醒</a></li>
        <li><em class="notice_system"></em><a href="/home/message/send_system">系统回复</a></li>
    </ul>
@elseif($type == 3)
    <ul id="message">
        <li><em class="notice_pm"></em><a href="/home/message">收件箱 </a></li>
        <li><em class="notice_pm"></em><a href="/home/message/send">发件箱</a></li>
        <li class="a"><em class="notice_system"></em><a href="/home/message/system">系统提醒</a></li>
        <li><em class="notice_system"></em><a href="/home/message/send_system">系统回复</a></li>
    </ul>
@elseif($type == 4)
    <ul id="message">
        <li><em class="notice_pm"></em><a href="/home/message">收件箱 </a></li>
        <li><em class="notice_pm"></em><a href="/home/message/send">发件箱</a></li>
        <li><em class="notice_system"></em><a href="/home/message/system">系统提醒</a></li>
        <li class="a"><em class="notice_system"></em><a href="/home/message/send_system">系统回复</a></li>
    </ul>
@endif
</div><div class="drag">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">发送私信</h4>
          </div>
            <form action="/home/message" method="post" class="shows_system_form" >
               {{ csrf_field() }}
               <div class="modal-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <div id="disabledInput" class="message_content form-control"disabled name="" style=" height: 260px; word-break: break-all; white-space: pre-wrap;" >
                    </div>
                  <br>
                  <input class="message_id" type="hidden" name="id">
                  <input type="textarea" name="content" class="form-control" id="exampleInputEmail1" placeholder="message">
                 </div>
                </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                 <button type="submit" class="btn btn-default">发送</button>
               </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
    $('#message li').click(function(){
        $('#message li').removeClass();
        $(this).addClass('a');
    });
</script>

</div>
</div>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div></div>
@endsection