<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\InformArticle;
use App\models\home\Article;
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
        $params = $request->all();
        $res = $request->input('search_name','');
        $pag = $request->input('search_count',5);
        $data = InformArticle::paginate($pag);
        return view('admin.areports.index',['data'=>$data,'title'=>'文章举报列表','params'=>$params]);
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
        //拿到单个数据 同意2之后 修改状态 删除j举报文章内容
        $report = InformArticle::find($id);
        //在文章举报列表中找到文章ID  在文章模型中进行删除
        $article = Article::find($report->article_id);
        if ($data['status'] ==1) {

            $report->status = 1;
        } else if ($data['status'] == 2) {
            //状态为同意
            $report->status = 2;
            //同时修改类型 
            $report->type = $data['type'];
            //删除文章
            $article->delete();

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
