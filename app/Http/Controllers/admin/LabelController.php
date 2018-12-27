<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Cates;
use App\models\admin\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $lname=$request->input('search_uname','');
        $page= $request->input('search_count',5);

        $label = Label::where('lname','like','%'.$lname.'%')->paginate($page);

        return view('admin.label.index',['title'=>'后台云标签列表','label'=>$label,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //获取所有分类
        $data = Cates::all();
        return view('admin/label/create',['title'=>'后台云标签添加','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取表单中分类id和标签名
        $id = $request->input('cates');
        $lname = $request->input('lname');

        //将数据写入数据库
        $label = new Label;
        $label->cates_id = $id;
        $label->lname = $lname;
        $res = $label->save();

       //得到结果判断
        if ($res) {
            return redirect('/admin/label')->with('success','恭喜云标签添加成功');
        }else{
            return back()->with('error','云标签文章添加失败');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $label = Label::find($id);
        $data = Cates::all();

        return view('admin.label.edit',['title'=>'云标签修改','label'=>$label,'data'=>$data]);
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
        //对数据进行修改
        $label = Label::find($id);
        $label->cates_id = $request->input('cates');
        $label->lname = $request->input('lname');
        $res = $label->save();
        
        //得到结果判断
        if ($res) {
            return redirect('/admin/label')->with('success','恭喜云标签修改成功');
        }else{
            return back()->with('error','云标签文章修改失败');
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
        $label = Label::find($id);
        $res = $label->delete();
        //得到结果判断
        if ($res) {
            return redirect('/admin/label')->with('success','恭喜云标签删除成功');
        }else{
            return back()->with('error','云标签文章删除失败');
        }
    }
}
