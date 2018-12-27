<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Links;
class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $res = $request->input('search_uname','');
        $pag = $request->input('search_count',5);
        //接收数 据
        $links = Links::where('links_name','like','%'.$res.'%')->paginate($pag);
        //加载视图,分配数据
        return view('admin.links.index',['links'=>$links,'params'=>$params,'title'=>'友情链接管理']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.create',['title'=>'友情链接添加']);
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
             'links_name' => 'required|max:8',
             'links_url' => 'required|regex:/^http:\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:\+#])/',
         ],[
             'links_name.required'=>'友情链接名称必填',
             'links_name.max'=>'友情链接名称不可大于8个字符',
             'links_url.required'=>'友情链接地址必填',
             'links_url.regex'=>'友情链接地址请正确填写',
         ]);
        //接收数据
        $data =  $request->except(['_token']);

        $links = new Links;
        $links->links_name = $data['links_name'];
        $links->links_url = $data['links_url'];
        $res = $links->save();
        if($res){
            return redirect('admin/links')->with('success','友情链接添加成功');
        } else {
             return back()->with('error','友情链接添加失败');
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
        //接收数据
        $edit = Links::find($id);
        return view('admin.links.edit',['edit'=>$edit,'title'=>'友情链接修改']);
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
        //接收修改数据
        $link = $request->except(['_token','_method']);
        //验证
        $this->validate($request, [
             'links_name' => 'required|max:10',
             'links_url' => 'required|regex:/^http:\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:\+#])/',
         ],[
             'links_name.required'=>'友情链接名称必填',
             'links_name.max'=>'友情链接名称不可大于10个字符',
             'links_url.required'=>'友情链接地址必填',
             'links_url.regex'=>'友情链接地址请正确填写',
         ]);

        $links = Links::find($id);
        $links->links_name = $link['links_name'];
        $links->links_url = $link['links_url'];
        $res = $links->save();
        if($res){
            return redirect('admin/links')->with('success','友情链接修改成功');
        } else {
             return back()->with('error','友情链接修改失败');
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
        //获取数据
        $data= Links::find($id);
        $res = $data->delete();

        if($res){
            return redirect('admin/links')->with('success','友情链接删除成功');
        } else {
             return back()->with('error','友情链接删除失败');
        }

    }
}
