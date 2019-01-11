<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\home\Concern;

class LayoutControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        
        
        //获取当前登录用户的id
        $login_id = session('login_users')->id;

        //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();


        if($concerns){
            //标识符,登陆用户已关注该业主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该业主
            $ifconcern = false;
        }

        //获取对象id用户的信息
        $users = Users::find($id);

        return view('home.layout.personal',['title'=>'个人资料','users'=>$users,'login_id'=>$login_id,'ifconcern'=>$ifconcern]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
