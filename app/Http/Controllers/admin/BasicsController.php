<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Basics;
class BasicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //搜索 分页  操作
         $params = $request->all();
         $res = $request->input('search_name','');
         $pag = $request->input('search_count',5);
        //获取全部数据
        $basics = Basics::where('name','like','%'.$res.'%')->paginate($pag);
        return view('admin.basics.index',['title'=>'网站配置管理','basics'=>$basics,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图
        return view('admin.basics.create',['title'=>'网站基本配置设置']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //验证
        $this->validate($request, [
            'name' => 'required|max:15',
            'desc' => 'required|min:10',
            'logo' => 'required',
            'tel'=>'regex:/^(400[0-9]{7})$/',

        ],[
            'name.required' => '网站名称不能为空',
            'name.unique' => '网站名称已重复,请重新填写',
            'name.max' => '网站名称长度过大,最大为15',
            'desc.required' => '网站描述不能为空',
            'desc.min' => '网站描述最低不得少于10字',
            'logo.required' => '请选择网站Logo上传',
            'tel.regex'=>'请输入400开头的11位正确号码',
        ]);

        //获取添加信息
        $data = $request->except('_token');
         //判断logo上传 
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $data['logo'] =$file->store('admin/images');
        }
        //验证名称是否数据库存在
        $mc = $request->name;
        if(Basics::where('name',$mc)->first()){
            return back()->with('error','网站名称已存在,请重新填写');
        }
        
        //保存到数据库
        $basics = new Basics;
        $basics->name = $data['name'];
        $basics->tel = $data['tel'];
        $basics->record_number = $data['record_number'];
        $basics->copyright = $data['copyright'];
        $basics->desc = $data['desc'];
        $basics->logo = $data['logo'];
        $res = $basics->save();
        if($res){
            return redirect('admin/basics')->with('success','网站配置添加成功');
        } else {
             return back()->with('error','网站配置添加失败');
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
        //拿到显示模态框的id
        $data = Basics::find($id);
        if ($data) {
            echo json_encode($data);
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
        //获取要修改的Id值
        $edit = Basics::find($id);
        return view('admin.basics.edit',['edit'=>$edit,'title'=>'网站配置修改']);
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
        //h获取已修改的id
        $data = $request->except(['_token','_method']);
         //验证
        $this->validate($request, [
            'name' => 'required|max:15',
            'desc' => 'required|min:10',
            'logo' => 'required',
            'tel'=>'regex:/^(400[0-9]{7})$/',

        ],[
            'name.required' => '网站名称不能为空',
            'name.unique' => '网站名称已重复,请重新填写',
            'name.max' => '网站名称长度过大,最大为15',
            'tel.regex'=>'请输入400开头的11位正确号码',
            'desc.required' => '网站描述不能为空',
            'desc.min' => '网站描述最低不得少于10字',
            'logo.required' => '请选择网站Logo上传',
            
        ]);
        //验证名称是否数据库存在
        $mc = $request->name;
        if(Basics::where('name',$mc)->first()){
            return back()->with('error','网站名称已存在,请重新填写');
        }
     
         //判断logo上传 
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $data['logo'] =$file->store('admin/images');
        }
        //保存到数据库
        $basics = Basics::find($id);
        $basics->name = $data['name'];
        $basics->tel = $data['tel'];
        $basics->record_number = $data['record_number'];
        $basics->copyright = $data['copyright'];
        $basics->desc = $data['desc'];
        $basics->logo = $data['logo'];
        $res = $basics->save();
        if($res){
            return redirect('admin/basics')->with('success','网站配置修改成功');
        } else {
             return back()->with('error','网站配置修改失败');
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
        //删除所选ID
        $data = Basics::find($id);
        $res = $data->delete();
        if ($res) {
            return redirect('admin/basics')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
