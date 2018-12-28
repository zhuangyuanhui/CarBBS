<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Users;
use Hash;
use Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $search_uname = $request->input('search_uname','');
        $search_count = $request->input('search_count');
        $data = Users::where('uname','like','%'.$search_uname.'%')->paginate($search_count);
        return view('admin.users.index',['params'=>$params,'data'=>$data,'title'=>'后台用户列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>'添加用户']);
    }


   
    /**
     * 发送邮件
     */
    public function sendEmailCode($email='18854466630@163.com')
    {
        //发送邮件
        $email_code = rand(100000,999999);
        session(['email_code'=>$email_code]);
         Mail::send('admin.users.email', ['title' => '爱车网','email_code' =>  $email_code], function ($m) use ($email) {
           
                   //接收者                     //邮件标题
            $m->to($email)->subject('【爱车网】');
        });

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
            $this->validate($request, [
                'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
                'upwd' => 'required|regex:/^[\w]{6,18}$/',
                'reupwd' => 'required|same:upwd',
                'email' => 'required|email',
                'tel' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/'
                 ],[
                'uname.required'=>'请输入用户名',
                'uname.regex'=>'用户名请以字母开头,字母数字的组合',
                'upwd.required'=>'请输入密码',
                'upwd.regex'=>'请输入6-18位数字字母的密码',
                'reupwd.required'=>'请输入验证密码',
                'reupwd.same'=>'密码不一致',
                'email.required'=>'请输入邮箱',
                'email.email'=>'邮箱格式不正确',
                'tel.required'=>'请输入手机号',
                'tel.regex'=>'请输入正确的手机号',

                 ]);
                

                if($request->input('email_code') == session('email_code')){
                        $users = new Users;
                        $uname = $request->uname;
                        if(!Users::where('uname',$uname)->first()){
                            $data = $request->except('_token','reupwd');
                            $data['upwd'] = Hash::make($data['upwd']);

                            //头像上传
                            if ($request->file('profiles')) {
                                $files = $request->file('profiles')->store('admin/users');          
                                $data['users_pic'] = $files;
                                $users->users_pic = $data['users_pic'];
                            } 
                            $users->uname = $uname;
                            $users->upwd = Hash::make($request->upwd);
                            $users->email = $request->email;
                           
                            $users->tel = $request->input('tel');
                            $users->ctime = date('Y-m-d H:i:s',time());
                            $res = $users->save();
                            if($res){
                                return redirect('admin/users')->with('success','后台用户添加成功');
                            } else {
                                 return back()->with('error','后台用户添加失败');
                            }
                        } else {
                            return back()->with('error','该用户已存在');
                        }

                } else {
                    return back()->with('error','邮箱验证码错误');
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

        $data = Users::where('id',$id)->first();
        return view('admin.users.edit',['title'=>'用户信息修改','data'=>$data]);
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
        'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
        'email' => 'required|email',
        'tel' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/'
         ],[
        'uname.required'=>'用户名必填',
        'uname.regex'=>'用户名格式错误',
        'email.required'=>'邮箱必填',
        'email.email'=>'邮箱格式不正确',
        'tel.required'=>'手机号必填',
        'tel.regex'=>'手机号格式错误',

         ]);
        $User = Users::where('id',$id)->first();
        $User->uname = $request->input('uname');
        $User->email = $request->input('email');
        $User->tel = $request->input('tel');
        //头像上传
        if ($request->file('profiles')) {
            $files = $request->file('profiles')->store('admin/users');          
            $User->users_pic = $files;
        }
        $res = $User->save();
        if($res){
            return redirect('admin/users')->with('success','后台用户修改成功');
        } else {
             return back()->with('error','后台用户修改失败');
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
        $res = Users::where('id',$id)->delete();
        if($res){
            return redirect('admin/users')->with('success','后台用户删除成功');
        } else {
             return back()->with('error','后台用户删除失败');
        }
    }

}
