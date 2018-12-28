<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Cates;
use App\models\home\Article;

class ArticlesControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Cates::all();
        return view('home.articles.create',['data'=>$data,'title'=>'发表文章']);
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
                'title' => 'required|max:30',
                'cates_id' => 'required',
                'content' => 'required'
                 ],[
                'title.required'=>'请输入文章标题',
                'title.max'=>'您输入的标题过长,请重新输入',
                'cates_id.required'=>'请选择文章类别',
                'content.required'=>'请输入文章内容'
                 ]);
         $Cates = new Article;
         $temp = '';
         if ($request->file('profiles')) {
             $files = $request->file('profiles');   
             foreach ($files as $key => $value) {
                //将多图的路径拼接成长字符串,
                $temp .= $value->store('admin/articles').'&';           
            }
            $data['article_pic'] = $temp;
            $Cates->article_pic = $data['article_pic'];
        } 
         $title = $request->input('title');
         if(!Article::where('title',$title)->first()){
             $Cates->users_id = 1; 
             $Cates->article_status = 1; 
             $Cates->title = $request->input('title'); 
             $Cates->cates_id = $request->input('cates_id'); 
             $Cates->content = $request->input('content'); 
             $Cates->ctime =time();
             $res = $Cates->save();
             if($res){
               return back()->with('success','发表文章成功');
             } else {
                return back()->with('error','发表文章失败');
             }

         } else {
            return back()->with('error','该标题已存在');
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
        //
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
        //
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
