<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
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
        $res2 = $huser->update();

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
}
