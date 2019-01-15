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
use App\models\home\UsersInfo;
use App\models\home\inform_article;
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
                 $login_users = session('login_users');
                 $user = Users::where('uname',$login_users->uname)->first();
                 $data = Article::where('users_id',$user->id)->get();
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
             if($request->input('labels')){
                $Article->labels_id = implode($request->input('labels'),',');
             }
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
        if ($request->session()->exists('login_users')) {
                //判断该文章是否被该用户收藏,设置标志符
                $user_id  = session('login_users')->id;
                if( users_article::where('users_id',$user_id)->where('article_id',$id)->first() ){
                    $flag = 1;
                } else {
                    $flag = 2;
                }

                //判断文章是否被该用户点赞
                $inpraise = explode(',', $article->inpraise);
                if(in_array(session('login_users')->id, $inpraise)){
                    //登录并且点赞$praise_trample = 1;
                    $praise_trample = 1;
                } else {
                    //判断文章是否被点踩
                    $intrample = explode(',', $article->intrample);
                    if(in_array((session('login_users')->id),$intrample)){
                        //登录并且点踩$praise_trample = 2;
                        $praise_trample = 2;
                    } else {
                        //登录并且没点赞没点踩$praise_trample = 3;
                        $praise_trample = 3;
                    }
                }
                
        } else { 
             $flag = 3;
             //没登录$praise_trample = 4
             $praise_trample = 4;
        }
        //获取该文章被收藏量
        $num = users_article::where('article_id',$id)->count();
        //获取文章类别
        $cates = Cates::find($article->cates_id);
        //获取云标签
        if($article->labels_id){
            $labels_id = explode(',',$article->labels_id); 
            foreach ($labels_id as $key => $value) {
                $labels[] = Label::where('id',$value)->first()->lname;
            }
        } else {
            $labels = [];
        }
        $article->save();
        //获取评论
        $art_comment = ArticlesControlle::getArtComment();
        //获取登录用户信息
         $login_users  = session('login_users');
         
        return view('home.articles.details',
                                           [
                                            'praise_trample'=>$praise_trample,
                                            'flag'=>$flag,
                                            'num'=>$num,
                                            'labels'=>$labels,
                                            'user'=>$user,
                                            'art_count'=>$art_count,
                                            'cate'=>$cate,
                                            'cates'=>$cates,
                                            'article'=>$article,
                                            'login_users'=>$login_users,
                                            'title'=>'文章详情',
                                            'art_comment'=>$art_comment,
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

    /**
     * 文章举报
     */
    public function report(Request $request)
    {
        $inform_article = new inform_article;
        $inform_article->users_id = $request->input('users_id');
        $inform_article->article_id = $request->input('article_id');
        $inform_article->type = $request->input('type');
        $inform_article->content = $request->input('content');
        $inform_article->ctime = time();
        $inform_article->status = 1;
        $res = $inform_article->save();
        if($res){
            return back()->with('success','举报成功');
        } else {
            return back()->with('error','举报失败');
        }


    }

    /**
     * 获取文章评论或回复
     */
    public static function getArtComment($id=0){
        $data = Comment::where('pid',$id)->orderBy('ctime','desc')->get();

        foreach ($data as $key => $value) {
            $value->users = Users::find($value->from_uid);
            $value->usersinfo = UsersInfo::where('users_id',$value->from_uid)->first();
            // 获取所有下一级 子分类
            $temp = self::getArtComment($value->id);
            $value->sub = $temp;
        }
        return $data;
    }

    /**
     * 文章评论回复
     */
    public function art_comment(Request $request,$pid=0)
    {
        if($request->input('pid')){
             $pid =$request->input('pid');
        } else {
            $pid = 0;
        }
        $id = session('login_users')->id;
        $art_comments = new Comment;
        $art_comments->pid = $pid;
        $art_comments->from_uid = $id;
        $art_comments->article_id = $request->input('article_id');
        $art_comments->content = $request->input('art_comment_content');
        $art_comments->ctime = time();
        $res = $art_comments->save();

        $user = Users::find($id);
        $user_info = UsersInfo::where('users_id',$id)->first();

        if($res){
            echo json_encode(['user'=>$user,'user_info'=>$user_info,'code'=>'success','comment'=>$art_comments]);
        } else {
            echo json_encode(['code'=>'error']);
        }

    }

    /**
     * 文章评论回复删除
     */
     public function art_comment_delete($id)
    {
        $res = Comment::where('id',$id)->delete();
        if($res){
            echo json_encode(['code'=>'success']);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }

    /**
     * 文章点赞
     */

    public function tags($id)
    {
        $user_id  = session('login_users')->id;

        $article = Article::where('users_id',$user_id)->where('id',$id)->first();
         
        $inpraise = explode(',', trim($article->inpraise,','));

        if(in_array($user_id, $inpraise)){
            foreach ($inpraise as $key => $value) {
                if($user_id == $value){
                    unset($inpraise[$key]);
                }
            }
            $article->praise = $article->praise-1;
            $article->inpraise = trim(implode($inpraise, ','),',');
            $res = $article->save();
            if($res){
                echo json_encode(['code'=>'success','type'=>'untags']);
            } else {
                echo json_encode(['code'=>'error']);
            }
        } else {
            array_push($inpraise, $user_id);
            $article->praise = $article->praise+1;
            $article->inpraise = trim(implode($inpraise, ','),',');
            $res = $article->save();
            if($res){
                echo json_encode(['code'=>'success','type'=>'tags']);
            } else {
                echo json_encode(['code'=>'error']);
            }

        }

    } 

    /**
     * 文章点踩
     */

    public function trample($id)
    {
        $user_id  = session('login_users')->id;

        $article = Article::where('users_id',$user_id)->where('id',$id)->first();
         
        $intrample = explode(',', trim($article->intrample,','));
        //判断给用户是否点踩
        if(in_array($user_id, $intrample)){
            foreach ($intrample as $key => $value) {
                if($user_id == $value){
                    unset($intrample[$key]);
                }
            }
            $article->trample = $article->trample-1;
            $article->intrample = trim(implode($intrample, ','),',');

            $res = $article->save();
            if($res){
                echo json_encode(['code'=>'success','type'=>'untrample']);
            } else {
                echo json_encode(['code'=>'error']);
            }
        } else {
            $article->trample = $article->trample+1;
            array_push($intrample, $user_id);
            $article->intrample = trim(implode($intrample, ','),',');
            $res = $article->save();
            if($res){
                echo json_encode(['code'=>'success','type'=>'trample']);
            } else {
                echo json_encode(['code'=>'error']);
            }
        }

        
    }


}
