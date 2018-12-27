<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\models\admin\Girls;

class GirlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $params = $request->all();
        $search_count = $request->input('search_count',2);
        $title = $request->input('title','');
        $data = Girls::where('title','like','%'.$title.'%')->paginate($search_count);
        
        return view('admin.girls.index',['title'=>'后台车模列表','data'=>$data,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.girls.create',['title'=>'后台车模添加']);
    }

    /**
     * 车模控制器,保存数据方法,多文件上传
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //正则匹配
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|min:10',
            'profiles' => 'required'
        ],[
            'title.required' => '标题不能为空',
            'title.max' => '标题长度过大,最大为50',
            'content.required' => '内容不能为空',
            'content.min' => '文章内容最低不得少于100字',
            'profiles.required' => '请选择图片上传' 
        ]);

        //接收表单数据
        $data = $request->except('_token');
        $temp = '';
        //判断图片上传处理
        if ($request->file('profiles')) {
            $files = $request->file('profiles');           
            foreach ($files as $key => $value) {
                //将多图的路径拼接成长字符串,
                $temp .= $value->store('admin/images').'&';           
            }

            $data['car_pic'] = $temp;
        }

        //追加创建时间 和 初始点击量
        $data['ctime'] = time();
        $data['clicks'] = 0;


        //将数据写入数据库
        $girls = new Girls;
        $girls->title = $data['title'];
        $girls->content = $data['content'];
        $girls->car_pic = $data['car_pic'];
        $girls->ctime = $data['ctime'];
        $girls->clicks = $data['clicks'];
        $res = $girls->save();

        //得到结果判断
        if ($res) {
            return redirect('/admin/girls')->with('success','恭喜车模文章添加成功');
        }else{
            return back()->with('error','车模文章添加失败');
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
        //获取相应的文章信息
        $data = Girls::find($id);
        $data->car_pic = rtrim($data->car_pic,'&');
        $data->car_pic = explode('&', $data->car_pic);
        if($data){
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
        //获取相应文章信息
        $girls = Girls::find($id);
        //将car_pic图片路径,由字符串转换成数组
        $girls->car_pic = rtrim($girls->car_pic,'&');
        $girls->car_pic = explode('&', $girls->car_pic);

        return view('admin.girls.edit',['title'=>'后台车模修改','girls'=>$girls]);
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
        //正则匹配
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|min:10',
        ],[
            'title.required' => '标题不能为空',
            'title.max' => '标题长度过大,最大为50',
            'content.required' => '内容不能为空',
            'content.min' => '文章内容最低不得少于100字', 
        ]);

        //接收表单数据
        $data = $request->except('_token');
        $temp = '';
        //判断图片上传处理
        if ($request->file('profiles')) {
            $files = $request->file('profiles');           
            foreach ($files as $key => $value) {
                $temp .= $value->store('admin/images').'&';           
            }

            $data['car_pic'] = $temp;
        }

        //追加创建时间 和 初始点击量
        $data['ctime'] = time();
        $data['clicks'] = 0;


        //将数据写入数据库
        $girls = Girls::find($id);
        $girls->title = $data['title'];
        $girls->content = $data['content'];
        if ($request->file('profiles')) {
            $girls->car_pic = $data['car_pic'];
        }
        $girls->ctime = $data['ctime'];
        $girls->clicks = $data['clicks'];
        $res = $girls->save();

        //得到结果判断
        if ($res) {
            return redirect('/admin/girls')->with('success','恭喜车模文章修改成功');
        }else{
            return back()->with('error','车模文章修改失败');
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
        $girls = Girls::find($id);
        Storage::delete($girls['car_pic']);
        $res = $girls->delete();
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
