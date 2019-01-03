<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\InformUsers;
use App\models\home\Users;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $params = $request->all();
        $search_name = $request->input('search_name','');
        $search_count = $request->input('search_count',5);
        $reports = InformUsers::where('content','like','%'.$search_name.'%')->paginate($search_count);
         return view('admin.reports.index',['title'=>'用户举报管理','reports'=>$reports,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        $data = InformUsers::find($id);
        return view('admin.reports.edit',['title'=>'用户举报审核','data'=>$data]);
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
        $data = $request->only('status','type','users_status','seal_time');
        $reports = InformUsers::find($id);
        $reports->status = $data['status'];
        $reports->type = $data['type'];
        $res1 = $reports->update();

        //将被举报用户信息修改
        $users = Users::where('id','=',$reports->inform_user)->first();
        $users->status = $data['users_status'];
        //解封或永久封号,修改封号道奇时间
         if($data['status'] == 1 || $data['status'] == 2){
            $users->seal_time = time();
        }
        //如果选择临时封号,则生成封号到期时间
        if(isset($data['seal_time'])){
            //获取当前时间戳
            $times = time();
            switch($data['seal_time']){
                case(1) : $users->seal_time = $times+(86400 * 3); break;
                case(2) : $users->seal_time = $times+(86400 * 7); break;
                case(3) : $users->seal_time = $times+(86400 * 30); break;
                case(4) : $users->seal_time = $times+(86400 * 180); break;
                case(5) : $users->seal_time = $times+(86400 * 365); break;
            }
        }
        $res2 = $users->update();


        if($res1 && $res2){
            return redirect('admin/reports')->with('success','审核完成');
        }else{
            return back()->with('error','审核失败');
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
        $reports = InformUsers::find($id);
        $res = $reports->delete();

        if($res){
            return redirect('admin/reports')->with('success','删除完成');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
