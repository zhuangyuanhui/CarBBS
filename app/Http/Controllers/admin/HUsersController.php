<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\admin\InformUsers;
use App\models\admin\Outbox;
use App\models\admin\Inbox;
use DB;

class HUsersController extends Controller
{
    /**
     * 前台用户管理列表页面
     *
     * $request 用于接收分页与搜索的数据
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $params = $request->all();
        //分页和搜索
        $search_name = $request->input('search_name','');
        $search_count = $request->input('search_count',5);

        $data = Users::where('uname','like','%'.$search_name.'%')->paginate($search_count);
        return view('admin.husers.index',['title'=>'前台用户管理','data'=>$data,'params'=>$params]); 
    }

    /**
     * 官方发送私信方法
     * 接受者id , 私信内容
     */
    static function send($users_id,$content)
    {
        //开启事务
        DB::beginTransaction();

        //获取后台管理员id
        $admin_id = session('users')->id;

        //将私信内容存进发件箱
        $outbox = new Outbox;
        $outbox->sender_id = $admin_id;
        $outbox->receiver_id = $users_id;
        //1为官方发送私信类型
        $outbox->message_type = 1;
        $outbox->message_content = $content;
        $outbox->send_time = time();
        $outbox->status = 1;
        $res1 = $outbox->save();


        //讲私信内容存进收件箱
        $inbox = new Inbox;
        $inbox->sender_id = $admin_id;
        $inbox->receiver_id = $users_id;
        //1为官方发送私信类型
        $inbox->message_type = 1;
        $inbox->message_content = $content;
        $inbox->send_time = time();
        $inbox->status = 1;
        $res2 = $inbox->save();

        if($res1 && $res2){
            DB::commit();
            return 'success';
        }else{
            DB::rollBack();
            return 'error';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param 给用户发送私信
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //接收表单的内容
        $data = $request->only('users','message_content');

        //调用发送私信方法
        $res = HUsersController::send($data['users'],$data['message_content']);

        if($res == 'success'){
            DB::commit();
            return redirect('/admin/husers')->with('success','私信发送成功');
        }else{
            DB::rollBack();
            return back()->with('error','私信发送失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  模态框显示详细信息
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $husers = Users::find($id);

        $husers->info = UsersInfo::where('users_id','=',$id)->first();
        if($husers){
            echo $husers;
        }else{
            echo json_encode(['code'=>'error']);
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
        $husers = Users::find($id);
        return view('admin.husers.edit',['title'=>'前台用户修改','husers'=>$husers]);
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
        DB::beginTransaction();
        $data = $request->only('sign_number','sign_days','status','seal_time');
        
        $husers = UsersInfo::where('users_id','=',$id)->first();
        //修改用户详情表
        $husers->sign_number = $data['sign_number'];
        $husers->sign_days = $data['sign_days'];
         $res1 = $husers->update();

        //修改用户表
        $huser = Users::find($id);
        $huser->status = $data['status'];
        //解封或永久封号,修改封号到期时间
         if($data['status'] == 1 || $data['status'] == 2){
            $huser->seal_time == time();
        }
        
        //添加封号到期时间
        if(isset($data['seal_time'])){
            //获取当前时间戳
            $times = time();
            switch($data['seal_time']){
                case(1) : $huser->seal_time = $times+(86400 * 3); break;
                case(2) : $huser->seal_time = $times+(86400 * 7); break;
                case(3) : $huser->seal_time = $times+(86400 * 30); break;
                case(4) : $huser->seal_time = $times+(86400 * 180); break;
                case(5) : $huser->seal_time = $times+(86400 * 365); break;
            }
        }
        $res2 = $huser->update();

        if($data['status'] == 2){
                 //拼接发送语句
                $str = '经官方核实,您近期存在严重违规现象,官方处理已将您的账号永久冻结,如需申诉请致电1008611';
                 //调用发送私信方法
                $res3 = HUsersController::send($id,$str);

        }else if($data['status'] == 3){
            //拼接发送语句
             $str = '经官方核实,您近期存在违规现象,官方处理已将您的账号冻结,到期时间为'.date('Y-m-d H:i:s',$huser->seal_time).'.如需申诉请致电1008611';
             //调用发送私信方法
              $res3 = HUsersController::send($id,$str);
        }
        
      

        if($res1 && $res2){
            DB::commit();
            return redirect('/admin/husers')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 后台管理单发私信
     */
    public function message($id)
    {
        $users = Users::find($id);
        return view('admin.husers.message',['title'=>'发送私信','users'=>$users]);
    }

    /**
     * 后台群发私信页面
     */
    public function messageall()
    {
        return view('admin.husers.messageall',['title'=>'发送私信']);
    }

    /**
     * 后台管理群发私信
     */
    public function sendall(Request $request)
    {   
        //接收表单私信内容
        $data = $request->only('content');
        //获取后台管理员id
        $admin_id = session('users')->id;
        //获取所有用户信息
        $users = Users::all();

        //遍历发送私信
        foreach ($users as $key => $value) {
            //调用发送私信方法
            HUsersController::send($value->id,$data['content']);
        }

        return redirect('/admin/husers')->with('success','私信群发成功');

    }
}
