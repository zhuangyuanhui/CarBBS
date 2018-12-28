<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\InformArticle;
class AreportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取全部数据
        $data = InformArticle::paginate(5);
        return view('admin.areports.index',['data'=>$data,'title'=>'文章举报列表']);
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
        $edit = InformArticle::find($id);
        return view('admin.areports.edit',['title'=>'审核信息','edit'=>$edit]);
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
        //获取审核内容 的状态  违规类型
        $data = $request->only(['status','type']);
        //拿到单个数据  修改状态 删除文章内容(未启用)
        $report = InformArticle::find($id);
        if ($data['status'] ==1) {

            $report->status = 1;
        } else if ($data['status'] == 2) {

            $report->status = 2; 
            $report->type = $data['type'];
        } else {

             $report->status = 3;
        }
        $res = $report->save();
        if ($res) {
            return redirect('admin/areports')->with('success','处理成功');
        } else {
            return back()->with('error','处理失败');
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
        //删除指定信息
        $data = InformArticle::find($id);
        $res = $data->delete();
        if ($res) {
            return redirect('admin/areports')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
