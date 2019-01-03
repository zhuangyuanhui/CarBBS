<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Users;
use Mail;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.login',['title'=>'登录爱车网']);
    }

    /**
     * 审查账号
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {

        $user =Users::where('uname',$request->input('uname'))->first();
        

        if(!$user){
            return back()->with('error','该用户名不存在,请重新登录');
        }
        $upwd = $request->input('upwd') ;

        if (!Hash::check( $upwd , $user->upwd ) ) {
            return back() ->with('error','密码输入错误,请重新输入');
        }
        // 存储一条数据至 Session 中...
        session(['users' => $user]);
        return redirect("admin/layout")->with('success','登录成功');     

    }

    /**
     * 退出登录
     *
     * @return \Illuminate\Http\Response
     */
    public function loginout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin/login')->with('success','已退出该账户');
    }    


    /**
     * 修改密码
     *
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        return view('admin.login.reset',['title'=>'添加新密码']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('admin.login.reset',['title'=>'输入新密码']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forget()
    {
        return view('admin.login.forget',['title'=>'忘记密码']);
    }


    /**
     * 发送邮件
     */
    public function sendEmailCode($email='18854466630@163.com')
    {
        //发送邮件
        $email_code = rand(100000,999999);
        echo $email_code;
        session(['email_code'=>$email_code]);
        Mail::send('admin.users.email', ['title' => '爱车网','email_code' =>  $email_code], function ($m) use ($email) {
           
                   //接收者                     //邮件标题
            $m->to($email)->subject('【爱车网】');
        });

    }

    public function checkemail(Request $request)
    {
        $this->validate($request, [
                'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
                'email' => 'required|email',
                 ],[
                'uname.required'=>'请输入用户名',
                'uname.regex'=>'用户名请以字母开头,字母数字的组合',   
                'email.required'=>'请输入邮箱',
                'email.email'=>'邮箱格式不正确',
                 ]);
                  if($request->input('email_code') == session('email_code')){
                        $uname = $request->uname;
                        $user = Users::where('uname',$uname)->first();
                        if(!$user->uname){
                            return back()->with('error','该用户不存在');
                        }
                        session(['uname' => $uname]);
                        return redirect('/admin/login/reset')->with('success','验证成功,请输入新密码');
                        
                  } else {
                    return back()->with('error','提交失败,请重新提交');
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
        return view('admin.login.edit',['title'=>'修改密码','id'=>$id]);
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
        $this->validate($request, [
                'oldupwd' => 'required|regex:/^[\w]{6,18}$/',
                'upwd' => 'required|regex:/^[\w]{6,18}$/',
                'reupwd' => 'required|same:upwd',
                // 'email' => 'required|email',
                 ],[
                'oldupwd.required'=>'请输入旧密码',
                'oldupwd.regex'=>'旧密码格式错误',                
                'upwd.required'=>'请输入新密码密码',
                'upwd.regex'=>'新密码请输入6-18位数字字母的密码',
                'reupwd.required'=>'请输入验证密码',
                'reupwd.same'=>'密码不一致',
                // 'email.required'=>'请输入邮箱',
                // 'email.email'=>'邮箱格式不正确',

                 ]);
         $user = Users::where('id',$id)->first();
         // if($request->input('email_code') == session('email_code')){
            if( Hash::check( $request->input('oldupwd') ,$user->upwd) ) {
                $user->upwd = Hash::make($request->input('upwd'));
                $res = $user->save();
                if($res){
                    return redirect('admin/login')->with('success','密码修改成功，请重新登陆');
                } else {
                    return back()->with('error','密码修改失败');
                }
            } else {
                 return back()->with('error','旧密码输入错误');
            }
    //      } else {
    //         return back()->with('error','邮箱验证码错误');
    //     }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changepwd(Request $request)
    {

        $this->validate($request, [
                'upwd' => 'required|regex:/^[\w]{6,18}$/',
                'reupwd' => 'required|same:upwd',
                 ],[
                'upwd.required'=>'请输入密码',
                'upwd.regex'=>'请输入6-18位数字字母的密码',
                'reupwd.required'=>'请输入验证密码',
                'reupwd.same'=>'密码不一致',
                 ]);

                $uname = session('uname');
                $user = Users::where('uname',$uname)->first();
                $user->upwd = Hash::make($request->input('upwd'));
                $res = $user->save();
                if($res){
                    $request->session()->flush();
                    return redirect('/admin/login')->with('success','密码修改成功');
                } else {
                    return back()->with('error','密码修改未成功');
                }
        
    }
}
