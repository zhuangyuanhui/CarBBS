<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\models\home\Outbox;
use App\models\home\Inbox;
use DB;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    

    /**
     * 用户收件箱
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //登录用户信息
        $user = session('login_users');
        //登录用户Id
        $id = $user->id;
        //当前用户的用户收件箱
        $data = Inbox::where('receiver_id',$id)->where('message_type',2)->orderBy('send_time','desc')->paginate(5);
        //用户发送者信息
        foreach ($data as $key => $value) {
            $value->user = \App\models\home\Users::where('id',$value->sender_id)->first();
        }
        return view('home.message.index',[
                                           'title'=>'收件箱',
                                           'user'=>$user,
                                           'data'=>$data,
                                           //type =>1,为用户收件箱
                                           'type'=>1
                                       ]);
    }

    /**
     * 用户发件箱
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        //登录用户信息
        $user = session('login_users');
        //登录用户Id
        $id = $user->id;
        //当前用户的用户发件箱
        $data = Outbox::where('sender_id',$id)->where('message_type',2)->orderBy('send_time','desc')->paginate(5);
         //用户发送者信息
        foreach ($data as $key => $value) {
            $value->user =  \App\models\home\Users::where('id',$value->receiver_id)->first(); 
        }

        return view('home.message.index',[
                                           'title'=>'发件箱',
                                           'user'=>$user,
                                           'data'=>$data,
                                           //type =>2,为用户发件箱
                                           'type'=>2
                                       ]);
    }

    /**
     * 系统信息
     *
     * @return \Illuminate\Http\Response
     */
    public function system()
    {
        //登录用户信息
        $user = session('login_users');
        //登录用户Id
        $id = $user->id;
        //当前用户的系统收件箱
        $data = Inbox::where('receiver_id',$id)->where('message_type',1)->paginate(5);
        //后台发送者信息
        foreach ($data as $key => $value) {
            $value->user = \App\models\admin\Users::where('id',$value->sender_id)->first(); 
        }
        return view('home.message.index',[
                                           'title'=>'系统信息',
                                           'user'=>$user,
                                           'data'=>$data,
                                           //type =>3,为系统信息
                                           'type'=>3
                                       ]);
    }

        /**
     * 系统发件箱
     *
     * @return \Illuminate\Http\Response
     */
    public function send_system()
    {
        //登录用户信息
        $user = session('login_users');
        //登录用户Id
        $id = $user->id;
        //当前用户的用户发件箱
        $data = Outbox::where('sender_id',$id)->where('message_type',1)->orderBy('send_time','desc')->paginate(5);
         //用户发送者信息
        foreach ($data as $key => $value) {
            $value->user =  \App\models\admin\Users::where('id',$value->receiver_id)->first(); 
        }
        return view('home.message.index',[
                                           'title'=>'发件箱',
                                           'user'=>$user,
                                           'data'=>$data,
                                           //type =>4,为系统发件箱
                                           'type'=>4
                                       ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * message 私信
     */
    public function store(Request $request)
    {
        $outbox = new Outbox;
        $inbox = new Inbox;
        //开启事务
         DB::beginTransaction();


        $outbox->sender_id = session('login_users')->id;
        $outbox->receiver_id = $request->input('id');
        $outbox->message_type = 2;
        $outbox->status = 1;
        $outbox->send_time = time();
        $outbox->message_content = $request->input('content');
        $res1 = $outbox->save();


        $inbox->sender_id = session('login_users')->id;
        $inbox->receiver_id = $request->input('id');
        $inbox->message_type = 2;
        $inbox->status = 1;
        $inbox->send_time = time();
        $inbox->message_content = $request->input('content');
        $res2 = $inbox->save();

        if($res1 && $res2){
            //成功提交事务
            DB::commit();
            return back()->with('success','发送成功');
        } else {
            //失败事务回滚
            DB::rollBack();
            return back()->with('error','发送失败');

        }


    }

    /**
     * message 私信
     */
    public function store_system(Request $request)
    {
        $outbox = new Outbox;
        $inbox = new Inbox;
        //开启事务
         DB::beginTransaction();


        $outbox->sender_id = session('login_users')->id;
        $outbox->receiver_id = $request->input('id');
        $outbox->message_type = 1;
        $outbox->status = 1;
        $outbox->send_time = time();
        $outbox->message_content = $request->input('content');
        $res1 = $outbox->save();


        $inbox->sender_id = session('login_users')->id;
        $inbox->receiver_id = $request->input('id');
        $inbox->message_type = 1;
        $inbox->status = 1;
        $inbox->send_time = time();
        $inbox->message_content = $request->input('content');
        $res2 = $inbox->save();

        if($res1 && $res2){
            //成功提交事务
            DB::commit();
            return back()->with('success','发送成功');
        } else {
            //失败事务回滚
            DB::rollBack();
            return back()->with('error','发送失败');

        }


    }

    /**
     * 查看内容
     */
    public function look($id)
    {
        $inbox  = Inbox::where('id',$id)->first();
        //消息状态改为已读
        $inbox->status = 2;
        $res = $inbox->save();
         if($res){
            echo json_encode(['msg'=>'success']);
        } else {
            echo json_encode(['msg'=>'error']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 收件箱删除
     */
    public function sdelete($id)
    {
        $res = Inbox::where('id',$id)->delete();
        if($res){
            echo json_encode(['msg'=>'success']);
        } else {
            echo json_encode(['msg'=>'error']);
        }
    }

     /**
     * 发件箱删除
     */
    public function fdelete($id)
    {
        $res = Outbox::where('id',$id)->delete();
        if($res){
           echo json_encode(['msg'=>'success']);exit;
        } else {
            echo json_encode(['msg'=>'error']);exit;
        }
    }
}
