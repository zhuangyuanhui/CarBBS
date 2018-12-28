<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Article;

class HArticlesController extends Controller
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
        $search_count = $request->input('search_count','5');
        $data = Article::where('title','like','%'.$search_uname.'%')->paginate($search_count);
        $data = Article::all();
        $pic = [];
        foreach ($data as $key => $value) {
             $pic = explode( '&',trim($value->article_pic,'&'));
        }
        return view('admin.articles.index',['data'=>$data,'params'=>$params,'title'=>'文章管理','pic'=>$pic]);
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
        $article = Article::where('id',$id)->first();
        return view('admin.articles.edit',['article'=>$article]);
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
        $res = Article::where('id',$id)->delete();
        if($res){
            return redirect('admin/articles')->with('success','文章删除成功');
        } else {
            return back()->with('error','文章删除失败');

        }
    }
}
