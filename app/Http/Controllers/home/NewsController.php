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
use DB;

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
     * 获取新闻所有点赞人id
     */
    public static function getUsers_inpraise($id)
    {
        $new = News::find($id);
        if($new->inpraise){
            $new->inpraise = trim($new->inpraise,',');
            $praises = explode(',',$new->inpraise);

            return $praises;
        }else{
            return null;
        }
    }

    /**
     * 获取新闻所有点踩人id
     */
     public static function getUsers_intrample($id)
    {
        $new = News::find($id);
        if($new->intrample){
            $new->intrample = trim($new->intrample,',');
            $tramples = explode(',',$new->intrample);

            return $tramples;
        }else{
            return null;
        }
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

        foreach($news as $k=>$v){

            // 2.正则表达式 s让.可以匹配换行符
            $ptn = '/<img.*?src="(.*?)".*?>/s';
             $ptn2 = '/<p>(.*?)<\/p>/s';
            //正则替换去除img标签
            $v->content = preg_replace($ptn, '', $v->content);
            $v->content = preg_replace($ptn2, '$1', $v->content);
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

         foreach($news_top as $k=>$v){

            // 2.正则表达式 s让.可以匹配换行符
            $ptn = '/<img.*?src="(.*?)".*?>/s'; 
            $ptn2 = '/<p>(.*?)<\/p>/s';
            //正则替换去除img标签
            $v->content = preg_replace($ptn, '', $v->content); 
            $v->content = preg_replace($ptn2, '$1', $v->content); 
        }

    	return $news_top;
    }

    /**
     * 根据点击量排序,拿九条数据用于轮播图
     */
    static public function getNewsNine()
    {
    	$news_nine = News::orderBy('clicks','desc')->limit(9)->get();

        foreach($news_nine as $k=>$v){

            // 2.正则表达式 s让.可以匹配换行符
            $ptn = '/<img.*?src="(.*?)".*?>/s';
            $ptn2 = '/<p>(.*?)<\/p>/s';
            //正则替换去除img标签
            $v->content = preg_replace($ptn, '', $v->content); 
            $v->content = preg_replace($ptn2, '$1', $v->content); 
        }

    	return $news_nine;
    }

    /**
     * 新闻详情
     */
    public function details($id)
    {
        //获取新闻详情信息
        $new  = News::where('id',$id)->first();

        //新闻浏览量+1
        $new->clicks = $new->clicks+1;
        $new->save();

        if(session('login_users')){
             //登录用户id
                $users = session('login_users');
            //判断该用户是否已收藏该新闻 flag为收藏标识符 3为未登录用户
             if(Users_News::where('users_id',$users->id)->where('news_id',$id)->first()){
                $flag = 1;
             }else{
                $flag = 2;
             }

        //判断登录用户是否点赞该新闻 ifpraise为点赞标识符
             $praises = NewsController::getUsers_inpraise($id);
             if($praises){
                if(in_array($users->id, $praises)){
                    $ifpraise = 1;
                }else{
                    $ifpraise = 2;
                }

             }else{
                $ifpraise = 2;
                $praise_num = 0;
                
             }

             //判断登录用户是否点踩该新闻, iftrample为点踩标识符
             $tramples = NewsController::getUsers_intrample($id);
            if($tramples){
                if(in_array($users->id, $tramples)){
                    $iftrample = 1;
                }else{
                    $iftrample = 2;
                }
            }else{
                 $iftrample = 2;
            }
           
        }else{
            //如果未登录;
            $users = null;
            $flag = 3;
            $ifpraise = 3;
            $iftrample = 3;
        }

        //新闻被收藏量
         $num = Users_News::where('news_id',$id)->count();
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
                                        'num' => $num,
                                        'ifpraise'=>$ifpraise,
                                        'iftrample'=>$iftrample
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
        //开启事务
        DB::beginTransaction();

        //获取评论数据
        $comment = News_Comment::find($id);

        //判断该评论下是否有回复,有则删除
        if(News_Comment::find($comment->pid)){
            $reply = News_Comment::find($comment->pid);
            $res2 = $reply->delete();
        }else{
            //如果没有huifu,直接给标识符为true
            $res2 = true;
        }

        $res1 = $comment->delete();


        if($res1 && $res2){
            DB::commit();
            echo json_encode(['code'=>'success']);
        }else{
            DB::rollBack();
            echo json_encode(['code'=>'error']);
        }
    }

    /**
     * 新闻收藏功能
     */
    public function collect($id)
    {


        //当前登录用户id
        $user_id  = session('login_users')->id;

        //判断是否收藏
        $shoucang = Users_News::where('users_id',$user_id)->where('news_id',$id)->first();

        if($shoucang){
            $res = $shoucang->delete();
             //新闻被收藏量
         $num = Users_News::where('news_id',$id)->count();
                if($res){
                    echo json_encode(['code'=>'success','type'=>'quxiao','num'=>$num]);
                }else{
                    echo json_encode(['code'=>'error','type'=>'quxiao']);
                }
        } else {

            $users_news = new Users_News;

            $users_news->users_id = $user_id;
            $users_news->news_id = $id;
            $users_news->ctime = time();
            $res = $users_news->save();

        //新闻被收藏量
         $num = Users_News::where('news_id',$id)->count();
                if($res){
                   echo json_encode(['code'=>'success','type'=>'shoucang','num'=>$num]);
                } else {
                    echo json_encode(['code'=>'error','type'=>'shoucang']);
                }
        }


    }

    /**
     * 新闻点赞和取消点赞功能
     */
    public function praise($id)
    {
        //获取当前登录用户id
        $login_id = session('login_users')->id;
        //获取要操作的新闻对象
        $new = News::find($id);
        //获取新闻的点赞人数组
        $praises = NewsController::getUsers_inpraise($id);

        if($praises){
              //如果存在则为取消点赞
                if(in_array($login_id,$praises)){
                    foreach($praises as $k=>$v){
                        if($login_id == $v){
                            unset($praises[$k]);
                        }
                    }
                    $new->inpraise = implode(',', $praises).',';
                    $new->praise = $new->praise-1;
                    $res = $new->update();
                    if($res){
                        echo json_encode(['code'=>'success','type'=>'unpraise']);
                    }else{
                        echo json_encode(['code'=>'error']);
                    }
                }else{
                    $new->inpraise = implode(',', $praises).','.$login_id.',';
                        $new->praise = $new->praise+1;
                    $res = $new->update();
                    if($res){
                        echo json_encode(['code'=>'success','type'=>'praise']);
                    }else{
                        echo json_encode(['code'=>'error']);
                    }

                }
        }else{
                    $new->inpraise = $login_id.',';
                    $new->praise = 1;
                    $res = $new->update();
                    if($res){
                        echo json_encode(['code'=>'success','type'=>'praise']);
                    }else{
                        echo json_encode(['code'=>'error']);
                    }

                }
      

    }


    /**
     * 新闻点踩和取消点踩功能
     */
    public function trample($id)
    {
        //获取当前登录用户id
        $login_id = session('login_users')->id;
         //获取要操作的新闻对象
        $new = News::find($id);
        //获取新闻的点踩人数组
        $tramples = NewsController::getUsers_intrample($id);
        if($tramples){
             //如果存在则为取消点踩
            if(in_array($login_id,$tramples)){
                foreach($tramples as $k=>$v){
                    if($login_id == $v){
                        unset($tramples[$k]);
                    }
                }
                $new->intrample = implode(',', $tramples).',';
                $new->trample = $new->trample-1;
                $res = $new->update();
                if($res){
                    echo json_encode(['code'=>'success','type'=>'untrample']);
                }else{
                    echo json_encode(['code'=>'error']);
                }
            }else{
                $new->intrample = implode(',', $tramples).','.$login_id.',';
                $new->trample = $new->trample+1;
                $res = $new->update();
                if($res){
                    echo json_encode(['code'=>'success','type'=>'trample']);
                }else{
                    echo json_encode(['code'=>'error']);
                }

            }
        }else{
             $new->intrample = $login_id.',';
            $new->trample = 1;
            $res = $new->update();
            if($res){
                echo json_encode(['code'=>'success','type'=>'trample']);
            }else{
                echo json_encode(['code'=>'error']);
            }
        }
    }
    
}
