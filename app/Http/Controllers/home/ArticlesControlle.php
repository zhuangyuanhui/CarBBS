<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Cates;
use App\models\home\Article;
use App\models\admin\Comment;
use App\models\home\Users;
use App\models\home\Label;
use App\models\home\Drafts;
use App\models\home\Concern;
use App\models\home\users_article;
use DB;
use App\Http\Controllers\home\ArtRankController;

class ArticlesControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0)
    {
        switch ($id) {
            case 0:
                 $data = Article::all();
                 $flag = 0;
                break;
             case 1: 
                 $data = ArtRankController::click();
                 $flag = 1;
                break;
             case 2:
                 $data = ArtRankController::time();
                 $flag = 2;
                break;
             case 3:
                 $data = ArtRankController::praise();
                 $flag = 3;
                break;
             case 4:
                if(session('login_users')){
                        $login_users = session('login_users');
                     $user = Users::where('uname',$login_users->uname)->first();
                     $data = Article::where('users_id',$user->id)->get();
                }else{
                    $data = null;
                }
                 
                 $flag = 4;
                 break;
        }
        foreach ($data as $key => $value) {
            $value->count = Comment::where('article_id',$value->id)->count();
        }
       
        return view('home.articles.index',
                                        [
                                            'flag'=>$flag,
                                            'id'=>$id,
                                            'data'=>$data,
                                            'title'=>'文章列表'
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
         $login_users = session('login_users');
         $user = Users::where('uname',$login_users->uname)->first();
         $id = $user->id; 

         $Cates  = Cates::all();
         $Labels = Label::all(); 
         return view('home.articles.create',['Cates'=>$Cates,'Labels'=>$Labels,'id'=>$id,'title'=>'发表文章','user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
             if($res1){
                $count = $user->art_count+1;
                $user->art_count = $count;
                $user->save();
                 //成功提交事务
                DB::commit();
               return redirect("/home/personal/articles/$user->id")->with('success','发表文章成功');
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
    public function edit(Request $request,$id)
    {
        
        //获取文章详情
        $article   = Article::where('id',$id)->first();
        $article->clicks = $article->clicks+1;
        //获取作者信息
        $user      = Users::where('id',$article->users_id)->first();
        //获取该作者的文章数量
        $art_count = Article::where('users_id',$article->users_id)->count();
        //获取相同类型的文章
        $cate      = Article::where('cates_id',$article->cates_id)->orderBy('clicks','desc')->limit(3)->get();
        
        //判断用户是否登录
        if (session('login_users')) {
                //判断该文章是否被该用户收藏,设置标志符
                $user_id  = session('login_users')->id;
                if( users_article::where('users_id',$user_id)->where('article_id',$id)->first() ){
                    $flag = 1;
                } else {
                    $flag = 2;
                }
        } else { 
             $flag = 3;
        }
        //获取该文章被收藏量
        $num = users_article::where('article_id',$id)->count();
        //获取文章类别
        $cates = Cates::find($article->cates_id);
        //获取云标签
        $Article = Article::where('id',$id)->first();
        $labels_id = explode(',',$Article->labels_id); 
        foreach ($labels_id as $key => $value) {
            $labels[] = Label::where('id',$value)->first()->lname;
        }
        $article->save();
        return view('home.articles.details',
                                           [
                                            'flag'=>$flag,
                                            'num'=>$num,
                                            'labels'=>$labels,
                                            'user'=>$user,
                                            'art_count'=>$art_count,
                                            'cate'=>$cate,
                                            'cates'=>$cates,
                                            'article'=>$article,
                                            'title'=>'文章详情',
                                            'click'=> ArtRankController::click()
                                           ]
                                    );

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


    /**
     * 根据浏览量排序,拿20条数据用于排行榜
     */
    static public function clicks_article()
    {
        $clicks_article = Article::orderBy('clicks','desc')->limit(20)->get();

        return $clicks_article;
    }

    /**
     * 根据点赞量排序,拿20条数据用于排行榜
     */
    static public function praise_article()
    {
        $praise_article = Article::orderBy('praise','desc')->limit(20)->get();

        return $praise_article;
    }

    /**
     * 文章收藏
     */
    public function collect($id)
    {
        $user_id  = session('login_users')->id;

        $shoucang = users_article::where('users_id',$user_id)->where('article_id',$id)->first();

        if($shoucang){
            $res = $shoucang->delete();
                if($res){
                    echo json_encode(['code'=>'success','type'=>'quxiao']);
                }else{
                    echo json_encode(['code'=>'error','type'=>'quxiao']);
                }
        } else {
            $users_article = new users_article;
            $users_article->users_id = $user_id;
            $users_article->article_id = $id;
            $users_article->ctime = time();
            $res = $users_article->save();
                if($res){
                   echo json_encode(['code'=>'success','type'=>'shoucang']);
                } else {
                    echo json_encode(['code'=>'error','type'=>'shoucang']);
                }
        }

    }
}
