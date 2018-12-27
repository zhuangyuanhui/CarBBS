<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Cates;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收搜索关键 字
        $params = $request->all();
        $res=$request->input('search_cname','');
        $pag= $request->input('search_count',5);

        $data = Cates::where('cname','like','%'.$res.'%')->paginate($pag);
        //显示类别视图
        return view('admin.cates.index',['title'=>'类别管理','data'=>$data,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加类别视图
        return view('admin.cates.create',['title'=>'类别添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收类别名称   去除_token 秘钥
        $data = $request->except('_token');
        //验证名称是否数据库存在
        $mc = $request->cname;
        if(!Cates::where('cname',$mc)->first()){
            // 执行添加
            $cates = new Cates;
            //类别名称
            $cates->cname = $data['cname'];
            //保存
            $res=$cates->save();
            if ($res) {
                return redirect('admin/cates')->with('success','添加成功');
            } else {
                return back()->with('error','添加失败');
            }

        }else{
            return back()->with('error','网站名称已存在,请重新填写');
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
        //接收要修改的ID
        $edit = Cates::find($id);
        //加载修改页面
        return view('admin.cates.edit',['edit'=>$edit,'title'=>'友情链接修改']);
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
       // 接受数据
        $data = $request->except(['_token','_method']);
        //验证名称是否数据库存在
        $mc = $request->cname;
        if(!Cates::where('cname',$mc)->first()){
                // 执行添加
                $cates = Cates::find($id);
                //类别名称
                $cates->cname = $data['cname'];
                //保存
                $res=$cates->save();
                if ($res) {
                    return redirect('admin/cates')->with('success','修改成功');
                } else {
                    return back()->with('error','修改失败');
                }
                
        }else{
            return back()->with('error','网站名称已存在,请重新填写');
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
        //接收要删除的数据
       $data= Cates::find($id);
       $res = $data->delete();
        if($res){
            return redirect('admin/cates')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}
