<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\News;
use App\Http\Controllers\home\CatesController;
use App\models\home\Cates;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\home\News_Comment;
use App\models\home\Users_News;

class NewsController extends Controller
{	 
    /**
     * 获取新闻评论并排序
     */
    public static function getPidComment($pid = 0)
    {
        $data = News_Comment::where('pid',$pid)->orderBy('ctime','desc')->get();

        foreach ($data as $key => $value) {

            $value->users = Users::find($value->from_uid);
            $value->usersinfo = UsersInfo::where('users_id','=',$value->from_uid)->first();
            // 获取所有下一级 子分类
            $temp = self::getPidComment($value->id);
            $value->sub = $temp;
        }
        return $data;
    }


	/**
	 * 新闻列表页面
	 */
    public function index(Request $request,$id = 0)
    {	
    	//获取四个最新分类
    	$cates_four = CatesController::getCatesFour();

    	if($id == 0){
    		//获取所有文章,时间排序
    		$news = News::orderBy('ctime','desc')->paginate(5);
    		$cate = '新闻';
    	}else{
    		$news = News::where('cates_id','=',$id)->orderBy('ctime','desc')->paginate(5);
    		//获取相关分类信息
    		$cate = Cates::find($id);
    	}
    	

    	//获取推荐位
    	$news_top = NewsController::getNewsTop();
    	//获取九个热度最高的,轮播图 
    	$news_nine = NewsController::getNewsNine();
    	return view('home.news.index',[
    									'title'=>'新闻列表',
    									'news'=>$news,
    									'news_top'=>$news_top,
    									'news_nine'=>$news_nine,
    									'cates_four'=>$cates_four,
    									'cate' => $cate
    								]);
    }

    /**
     * 根据点击量排序,拿十条数据用于推荐位
     */
    static public function getNewsTop()
    {
    	$news_top = News::orderBy('clicks','desc')->limit(10)->get();

    	return $news_top;
    }

    /**
     * 根据点击量排序,拿九条数据用于轮播图
     */
    static public function getNewsNine()
    {
    	$news_nine = News::orderBy('clicks','desc')->limit(9)->get();

    	return $news_nine;
    }

    /**
     * 新闻详情
     */
    public function details($id)
    {
        //获取新闻详情信息
        $new      = News::where('id',$id)->first();
        if(session('login_users')){
             //登录用户id
                $users = session('login_users');
             if(Users_News::where('users_id',$users->id)->where('news_id',$id)->first()){
                $flag = 1;
             }else{
                $flag = 2;
             }
        }else{
            //如果未登录;
            $users = null;
            $flag = 3;
        }

        //文章被收藏量
         $num = Users_News::where('news_id',$id)->first();
        //获取相同类别文章
        $cate_new = News::where('cates_id',$new->cates_id)->orderBy('clicks','desc')->limit(10)->get();



        $comment_new = NewsController::getPidComment();

        //获取相关分类信息
            $cate = Cates::find($new->cates_id); 
        return view('home.news.details',
                                      [
                                        'cate_new'=>$cate_new,
                                        'new'=>$new, 
                                        'title'=>'新闻详情',
                                        'cate'=>$cate,
                                        'users'=>$users,
                                        'comment_new'=>$comment_new,
                                        'flag' => $flag,
                                        'num' => $num
                                      ]);

    }

    /* 根据浏览量排序,拿20条数据用于排行榜
     */
    static public function clicks_new()
    {
        $clicks_new = News::orderBy('clicks','desc')->limit(20)->get();

        return $clicks_new;
    }

    /**
     * 根据点赞量排序,拿20条数据用于排行榜
     */
    static public function praise_new()
    {
        $praise_new = News::orderBy('praise','desc')->limit(20)->get();

        return $praise_new;

    }

    /**
     * 添加评论 
     */
    public function news_comment(Request $request)
    {   
        //接收表单数据
        $data = $request->only('new_id','content');
        //获取当前登录id
        $login_id = session('login_users')->id;

        $comment = new News_Comment;
        $comment->pid = 0;
        $comment->from_uid = $login_id;
        $comment->news_id = $data['new_id'];
        $comment->content = $data['content'];
        $comment->ctime = time();
        $res = $comment->save();

        $users = Users::find($login_id);
        $usersinfo = UsersInfo::where('users_id','=',$login_id)->first();

        if($res){
            echo json_encode(['code'=>'success','comment'=>$comment,'users'=>$users,'usersinfo'=>$usersinfo]);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }

    /**
     * 添加回复
     */
    public function news_reply(Request $request)
    {
        $data = $request->only('pid','new_id','content');

        //获取当前登录id
        $login_id = session('login_users')->id;

        $comment = new News_Comment;
        $comment->pid = $data['pid'];
        $comment->from_uid = $login_id;
        $comment->news_id = $data['new_id'];
        $comment->content = $data['content'];
        $comment->ctime = time();
        $res = $comment->save();

        $users = Users::find($login_id);
        $usersinfo = UsersInfo::where('users_id','=',$login_id)->first();

        if($res){
            echo json_encode(['code'=>'success','comment'=>$comment,'users'=>$users,'usersinfo'=>$usersinfo]);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }

    /**
     * 评论回复删除功能
     */
    public function deletecomment($id)
    {
        $comment = News_Comment::find($id);
        $res = $comment->delete();

        if($res){
            echo json_encode(['code'=>'success']);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }

    /**
     * 新闻收藏功能
     */
     /**
     * 文章收藏
     */
    public function collect($id)
    {


        //当前登录用户id
        $user_id  = session('login_users')->id;

        //判断是否收藏
        $shoucang = Users_News::where('users_id',$user_id)->where('news_id',$id)->first();


        if($shoucang){
            $res = $shoucang->delete();
                if($res){
                    echo json_encode(['code'=>'success','type'=>'quxiao']);
                }else{
                    echo json_encode(['code'=>'error','type'=>'quxiao']);
                }
        } else {

            $users_news = new Users_News;

            $users_news->users_id = $user_id;
            $users_news->news_id = $id;
            $users_news->ctime = time();
            $res = $users_news->save();
                if($res){
                   echo json_encode(['code'=>'success','type'=>'shoucang']);
                } else {
                    echo json_encode(['code'=>'error','type'=>'shoucang']);
                }
        }


    }
}
