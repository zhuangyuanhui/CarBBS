<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * 前台用户登录页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('home.login.login',['title'=>"用户登陆"]);
    }

    /**
     * 前台用户登陆方法
     */
    public function dologin(Request $request)
    {
        $data = $request->only('phone','upwd');

        $users = Users::where('tel','=',$data['phone'])->orWhere('uname','=',$data['phone'])->first();
        if(Hash::check($data['upwd'],$users->upwd)){
            session(['login_users'=>$users]);
        }else{
            return back()->with('error','密码错误,请重新输入');
        }
    }


    /**
     * 检测用户是否存在
     */
    public function checkphone($phone)
    {
        $res = Users::where('tel','=',$phone)->orWhere('uname','=',$phone)->first();

        if(isset($res)){
            echo json_encode(['code'=>'success']);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }


    /**
     * 用户找回密码页面
     */
    public function forget()
    {
        return view('home.login.forget',['title'=>'忘记密码']);
    }


    /**
     * 
     */
    public function checkname($name)
    {
        $res = Users::where('uname','=',$name)->first();

        if($res){
            session(['forget_name'=>$name]);
            echo json_encode(['code'=>'success']);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }


    /**
     * 检测用户找回密码手机号是否属实
     */
    public function checktel($tel)
    {   
        $name = session('forget_name');
        $users = Users::where('uname','=',$name)->first();
        

        if($users->tel == $tel){
             echo json_encode(['code'=>'success']);
        }else{
             echo json_encode(['code'=>'error']);
        }
    }

    /**
     * 修改用户密码,
     */
    public function alert(Request $request)
    {   
        $data = $request->only('uname','tel','upwd','tel_code');

        $code = session('tel_code');
        if($data['tel_code'] != $code){
            return back()->with('error','验证码错误');
        }

        $user = Users::where('uname','=',$data['uname'])->first();
        if($user->tel != $data['tel']){
                return back()->with('error','手机号不正确');
        }


        $user->upwd = Hash::make($data['upwd']);
        $res = $user->update();

        if(isset($res)){
            return redirect('admin/login/login')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
        
    }

    /**
     * 前台找回密码发送手机号验证码
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
}
