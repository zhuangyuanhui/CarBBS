<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Slides;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $search_uname = $request->input('search_uname','');
        $search_count = $request->input('search_count');
        $data = Slides::where('slides_url','like','%'.$search_uname.'%')->paginate($search_count);
        return view('admin/slides/index',['title'=>'轮播图列表','params'=>$params,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slides/create',['title'=>'添加轮播图']);
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
        'slides_url' => 'required'
         ],[
            'slides_url.required'=>'跳转地址为空'
         ]);

        $slides = new Slides;
        if($request->file('slides_img')){
            $slides_img=$request->file('slides_img')->store('admin/slides');
            $slides->slides_img = $slides_img;
        }
            $slides->slides_url = $request->input('slides_url','');
            $slides->slides_status = 1;
            $res = $slides->save();
            if($res){
                return redirect('admin/slides')->with('success','图片添加成功');
            } else {
                return back()->with('error','图片添加失败');
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
        $slide = Slides::where('id',$id)->first();
        return view('admin/slides/edit',['title'=>'轮播图修改','slide'=>$slide]);
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
       $this->validate($request, [
        'slides_url' => 'required'
         ],[
            'slides_url.required'=>'跳转地址为空'
         ]);

        $slides = Slides::where('id',$id)->first();
        if($request->file('slides_img')){
            $slides_img=$request->file('slides_img')->store('admin/slides');
            $slides->slides_img = $slides_img;
        }
            $slides->slides_url = $request->input('slides_url','');
            $slides->slides_status =$request->input('slides_status','');
            $res = $slides->save();
            if($res){
                return redirect('admin/slides')->with('success','图片修改成功');
            } else {
                return back()->with('error','图片修改失败');
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
        $res = Slides::where('id',$id)->delete();
        if($res){
            return redirect('admin/slides')->with('success','图片删除成功');
        } else {
            return back()->with('error','图片删除失败');
        }
    }
}
