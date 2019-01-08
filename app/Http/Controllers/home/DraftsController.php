<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\models\home\Drafts;
use App\models\home\Users;
use App\Http\Controllers\Controller;
use App\models\admin\Cates;
use App\models\home\Article;
use App\models\admin\Comment;
use App\models\home\Label;
use App\Http\Controllers\home\ArtRankController;

class DraftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $drafts = Drafts::where('users_id',$id)->get();
        return view('home.drafts.index',['title'=>'草稿箱','drafts'=>$drafts]);
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
        $this->validate($request, [
                'title' => 'required|max:30',
                'cates_id' => 'required',
                'content' => 'required',
                'cover' => 'required'
                 ],[
                'title.required'=>'请输入文章标题',
                'title.max'=>'您输入的标题过长,请重新输入',
                'cates_id.required'=>'请选择文章类别',
                'content.required'=>'请输入文章内容',
                'cover.required'=>'请添加文章封面'
                 ]);
         $Drafts = new Drafts;
         $temp = '';
         if ($request->file('cover')) {
            $temp = $request->file('cover')->store('admin/draftss');   
            $data['cover'] = $temp;
            $Drafts->cover = $data['cover'];
        } 
         $title = $request->input('title');
         if(!Drafts::where('title',$title)->first()){
             $login_users = session('login_users');
             $user = Users::where('uname',$login_users->uname)->first();
             $Drafts->users_id = $user->id; 
             $Drafts->labels_id = implode(',',$request->input('labels')); 
             $Drafts->title = $request->input('title'); 
             $Drafts->cates_id = $request->input('cates_id'); 
             $Drafts->content = $request->input('content'); 
             $Drafts->ctime =time();
             $res = $Drafts->save();
             if($res){
                echo $msg = 'success';
             } else {
                 echo $msg = 'error';
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
    public function save(Request $request,$id=0)
    {
        //开启事务
         DB::beginTransaction();
         $this->validate($request, [
                'title' => 'required|max:30',
                'cates_id' => 'required',
                'content' => 'required',
                'cover' => 'required'
                 ],[
                'title.required'=>'请输入文章标题',
                'title.max'=>'您输入的标题过长,请重新输入',
                'cates_id.required'=>'请选择文章类别',
                'content.required'=>'请输入文章内容',
                'cover.required'=>'请添加文章封面'
                 ]);
         $Article = new Article;
         $temp = '';
         if ($request->file('cover')) {
            $temp = $request->file('cover')->store('admin/articles');   
            $data['cover'] = $temp;
            $Article->cover = $data['cover'];
        } 
         $title = $request->input('title');
         if(!Article::where('title',$title)->first()){
             $login_users = session('login_users');
             $user = Users::where('uname',$login_users->uname)->first();
             $Article->users_id = $user->id; 
             $Article->labels_id = implode($request->input('labels'),',');
             $Article->article_status = 1; 
             $Article->title = $request->input('title'); 
             $Article->cates_id = $request->input('cates_id'); 
             $Article->content = $request->input('content'); 
             $Article->ctime =time();
             $res1 = $Article->save();
             $res2 = Drafts::where('id',$id)->delete();
             if($res1 && $res2 ){
                $count = $user->art_count+1;
                $user->art_count = $count;
                 //成功提交事务
                DB::commit();
               return redirect("/home/articles/$user->id")->with('success','发表文章成功');
             } else {
                //失败事务回滚
                 DB::rollBack();
                return back()->with('error','发表文章失败');
             }

         } else {
            return back()->with('error','该标题已存在');
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
         $draft = Drafts::where('id',$id)->first();
         $lab = explode(',',$draft->labels_id);
         $login_users = session('login_users');
         $user = Users::where('uname',$login_users->uname)->first();
         $uid = $user->id; 

         $Cates  = Cates::all();
         $Labels = Label::all(); 
         return view('home.drafts.edit',[
                                         'Cates'=>$Cates,
                                         'id'=>$id,
                                         'lab'=>$lab,
                                         'Labels'=>$Labels,
                                         'uid'=>$uid,
                                         'title'=>'草稿箱',
                                         'draft'=>$draft
                                     ]);

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
                'title' => 'required|max:30',
                'cates_id' => 'required',
                'content' => 'required',
                'cover' => 'required'
                 ],[
                'title.required'=>'请输入文章标题',
                'title.max'=>'您输入的标题过长,请重新输入',
                'cates_id.required'=>'请选择文章类别',
                'content.required'=>'请输入文章内容',
                'cover.required'=>'请添加文章封面'
                 ]);
         $Drafts = Drafts::where('id',$id)->first();
         $temp = '';
         if ($request->file('cover')) {
            $temp = $request->file('cover')->store('admin/draftss');   
            $data['cover'] = $temp;
            $Drafts->cover = $data['cover'];
        } 
        
             $login_users = session('login_users');
             $user = Users::where('uname',$login_users->uname)->first();
             $Drafts->users_id = $user->id; 
             $Drafts->labels_id = implode(',',$request->input('labels')); 
             $Drafts->title = $request->input('title'); 
             $Drafts->cates_id = $request->input('cates_id'); 
             $Drafts->content = $request->input('content'); 
             $Drafts->ctime =time();
             $res = $Drafts->update();
             if($res){
                echo $msg = 'success';
             } else {
                 echo $msg = 'error';
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
         $res = Drafts::where('id',$id)->delete();
         $login_users = session('login_users');
         $user = Users::where('uname',$login_users->uname)->first();
         $uid = $user->id; 

         if($res){
           return redirect("home/drafts/index/$uid")->with('success','删除成功');
         } else {
            return back()->with('error','删除失败');
         }
    }
}
