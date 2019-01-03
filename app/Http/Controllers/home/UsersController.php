<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\home\Concern;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.users.create',['title'=>'前台注册']);
    }

    /**
     * 前台发送手机号验证码
     *
     */
    public function sendTelCode($tel)
    {
        $tel_code = rand(1000,9999);
        session(['tel_code'=>$tel_code]);
        $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
        $target .= "&account=C27705034&password=b11f588eee93d5a6d5432fcc448df1fb&format=json&mobile=".$tel."&content=".rawurlencode("您的验证码是：".$tel_code."。请不要把验证码泄露给其他人。");
        //使用curl(百度)

        //初使化init方法
       $ch = curl_init();

       //指定URL
       curl_setopt($ch, CURLOPT_URL, $target);

       //设定请求后返回结果
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       //发送请求
       $res = curl_exec($ch);

       dump($res);
       //关闭curl
       curl_close($ch);
    }
    /**
     * 前台用户注册存入数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['uname','upwd','tel','tel_code']);

        $code = session('tel_code');
        if($data['tel_code'] != $code){
            return back()->with('error','验证码错误');
        }
        //开启事务
        DB::beginTransaction();
        //将数据存入前台用户表
        $users = new Users;
        $users->uname = $data['uname'];
        $users->upwd = Hash::make($data['upwd']);
        $users->tel = $data['tel'];
        $users->ctime = time();
        $users->status = 1;
        $res1 = $users->save();
        
        //将信息存入用户详情表
        $users_info = new UsersInfo;
        $users_info->users_id = $users->id;
        $users_info->sign_number = 5;
        $users_info->sign_time = time();
        $users_info->sign_days = 1;
        $res2 = $users_info->save();

        if($res1 && $res2){
            DB::commit();
            return redirect()->with('success','注册成功');
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * ajax方法判断用户名是否存在
     */
    public function checkname($name)
    {
        $res = Users::where('uname','=',$name)->first();
        if($res){
            echo json_encode(['code'=>'error']);
        }else{
            echo json_encode(['code'=>'success']);
        }
    }
    
    /**
     * ajax方法判断手机号是否存在
     */
    public function checktel($tel)
    {  
       $res = Users::where('tel','=',$tel)->first();
        if($res){
            echo json_encode(['code'=>'error']);
        }else{
            echo json_encode(['code'=>'success']);
        } 
    }

    /**
     * 按照积分排序得出用户排行
     */
    static function number_users()
    {
        $number_users = UsersInfo::orderBy('sign_number','desc')->limit(20)->get();
        return $number_users;
    }

    /**
     * 按照粉丝量排序得出用户排行
     */
    static function fans_users()
    {
        $users = Users::all();
        foreach($users as $key=>$value){
            $value->count = Concern::where('users_id',$value->id)->count();
        }

        dump($users);exit;
        return $users;
    }


    /**
     * 按照发帖量排序得出用户排行
     */
    static function article_users()
    {
        $article_users = UsersInfo::orderBy('sign_number','desc')->limit(20)->get();
        return $article_users;
    }

    /**
     * 按照连续签到排序得出用户排行
     */
    static function sign_users()
    {
        $sign_users = UsersInfo::orderBy('sign_days','desc')->limit(20)->get();
        return $sign_users;
    }

}
