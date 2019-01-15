<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\home\Concern;
use DB;
use App\models\home\Article;
use App\models\home\Inform_Users;
use App\models\home\users_models;
use App\models\home\Users_News;
use App\models\admin\Comment;
use App\models\home\users_article;
use Hash;

class PersonalController extends Controller
{ 
    /**
     * 个人资料首页
     */
    public function index($id=0)
    {	 
    	
    	//获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();


        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该业主
            $ifconcern = false;
        }
        //获取对象id用户的信息
	    $users = Users::find($id);

    	return view('home.personal.index',['title'=>'个人资料','users'=>$users,'login_id'=>$login_id,'ifconcern'=>$ifconcern,'type'=>1]);
    }

    /**
     * 无刷新更换头像
     */
    public function image(Request $request)
    {	
    	if($request->hasfile('profile')){
    		//获取文件上传对象
    		$profile = $request->file('profile');

    		//获取当前登录用户的id
	    	$login_id = session('login_users')->id;

	    	//保存图片并生成文件名
	    	$filename= $profile->store('home/personal/images');

	    	//更新数据库,更换用户头像信息
	    	$user = UsersInfo::where('users_id','=',$login_id)->first();
	    	$user->face = $filename;
	    	$res = $user->update();
    	}
        //得出结果返回数据
    	if($res){
		$arr = [
				'msg'=>'success',
				'path'=>$filename
			];
		}else{
			$arr = [
				'msg'=>'error',
				'path'=>''
			];
		} 
		echo json_encode($arr);
    }

    /**
     * 个人资料修改页面
     */
    public function edit($id)
    {	
    	//获取修改用户原资料
    	$users = Users::find($id);

        //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

         //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();

        if($concerns){
            //标识符,登陆用户已关注该业主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该业主
            $ifconcern = false;
        }

        //加载页面,分配数据
    	return view('home.personal.edit',['title'=>'资料修改','users'=>$users,'login_id'=>$login_id,'ifconcern'=>$ifconcern,'type'=>1]);
    }

    /**
     * 个人资料提交修改
     
     */
    public function store(Request $request,$id)
    {     
        //获取表单的数据
        $data = $request->only(['nickname','sex','age','addr','country','town','email','intro']);
        //开启事务
         DB::beginTransaction();

         //保存信息到用户主表
        $data['addr'] = $data['addr'].$data['country'].$data['town'];
        $user = Users::find($id);
        $user->nickname = $data['nickname'];
        $res1 = $user->update();

        //保存信息到用户详情表
        $user_info = UsersInfo::where('users_id','=',$id)->first();
        $user_info->age = $data['age'];
        $user_info->sex = $data['sex'];
        $user_info->addr = $data['addr'];
        $user_info->email = $data['email'];
        $user_info->intro = $data['intro'];
        $res2 = $user_info->update();

        //判断是否成功
        if($res1 && $res2){
            //成功提交事务
            DB::commit();
            return redirect('/home/personal/index/0')->with('success','修改成功');
        }else{
            //失败事务回滚
            DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * 个人空间文章页面
     */
    public function articles($id = 0)
    {   
        //获取修改用户原资料
        $users = Users::find($id);

         //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }


         //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();


        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该页主
            $ifconcern = false;
        }


        //获取个人的所有文章
        $articles = Article::where('users_id','=',$id)->get();
        //加载页面,分配数据
        return view('home.personal.article',['title'=>'个人文章','users'=>$users,'login_id'=>$login_id,'articles'=>$articles,'ifconcern'=>$ifconcern,'type'=>2]);
    }

    /**
     * 个人空间文章删除功能
     */
    public function deleted($id)
    {
       $article = Article::find($id);
       $res = $article->delete();

      //同时删除相应的评论和收藏
      $comment = Comment::where('article_id','=',$id)->get();
      foreach ($comment as $k=>$v) {
           $v->delete();
      }
      $shouc = users_article::where('article_id','=',$id)->get();
      foreach ($shouc as $key => $value) {
          $value->delete();
      }


       if($res){
            echo json_encode(['code'=>'success']);
       }else{
            echo json_encode(['code'=>'error']);
       }
    }

    /**
     * 个人空间收藏文章页面
     */
    public function users_articles($id = 0)
    {   
        
          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //判断当前页主用户与当前登录用户是否为关注

        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();


        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该页主
            $ifconcern = false;
        }

        //获取个人的所有信息
        $users = Users::where('id','=',$id)->first();

        //加载页面,分配数据 type用于判断被选中类a ,
        return view('home.personal.users_articles',['title'=>'个人文章','users'=>$users,'login_id'=>$login_id,'article'=>$users->article,'ifconcern'=>$ifconcern,'type'=>3]);
    }

    /**
     * 个人空间收藏新闻页面
     */
    public function users_news($id = 0)
    {   
        
         //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();

        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该页主
            $ifconcern = false;
        }

        //获取个人的所有信息
        $users = Users::where('id','=',$id)->first();

        //加载页面,分配数据
        return view('home.personal.users_news',['title'=>'个人文章','users'=>$users,'login_id'=>$login_id,'news'=>$users->news,'ifconcern'=>$ifconcern,'type'=>3]);
    }

    /**
     * 个人空间收藏车模页面
     */
    public function users_girls($id = 0)
    {   
        
          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();


        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该页主
            $ifconcern = false;
        }

        //获取个人的所有信息
        $users = Users::where('id','=',$id)->first();

        //加载页面,分配数据
        return view('home.personal.users_girls',['title'=>'个人文章','users'=>$users,'login_id'=>$login_id,'girls'=>$users->girls,'ifconcern'=>$ifconcern,'type'=>3]);
    }

    /**
     * 我的关注
     */
    public function concern($id=0)
    {
          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

         //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();

        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该页主 
            $ifconcern = false;
        }

        $users = Users::find($id);
        return view('home.personal.concern',['title'=>'我的关注','users'=>$users,'login_id'=>$login_id,'concern'=>$users->users_concern,'ifconcern'=>$ifconcern,'type'=>4]);
    }

    /**
     * 我的粉丝
     */
    public function fans($id=0)
    {
          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

         //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();

        if($concerns){
            //标识符,登陆用户已关注该页主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该页主 
            $ifconcern = false;
        }

        $users = Users::find($id);
        return view('home.personal.fans',['title'=>'我的粉丝','users'=>$users,'login_id'=>$login_id,'fans'=>$users->users_fans,'ifconcern'=>$ifconcern,'type'=>5]);
    }


    /**
     * 用户举报页面
     */
    public function report($id)
    {   
         //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

         //判断当前页主用户与当前登录用户是否为关注
        $concerns = Concern::where('users_id','=',$id)->where('fans_id','=',$login_id)->first();

        if($concerns){
            //标识符,登陆用户已关注该业主
            $ifconcern = true;
        }else{
            //标识符,登陆用户未关注该业主
            $ifconcern = false;
        }

        $users = Users::find($id);
        return view('home.personal.report',['title'=>'我的关注','users'=>$users,'login_id'=>$login_id,'ifconcern'=>$ifconcern,'type'=>1]);
        $users = Users::find($id);

        //关注量 
        

        // 粉丝量
        
        

        //dump(count($fans));exit;
        return view('home.personal.concern',[
                                    'title'=>'我的关注',
                                    'users'=>$users,
                                    'login_id'=>$login_id,
                                    'concern'=>$users->users_concern,
                                    
                                ]);
    }


    /**
     * 将用户举报信息写入数据库
     */
    public function report_store(Request $request)
    {
        //接收表单数据
        $data = $request->only('users_id','type','content');

          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }
        //添加举报表记录
        $inform_users = new Inform_Users;
        $inform_users->users_id = $login_id;
        $inform_users->inform_user = $data['users_id'];
        $inform_users->type = $data['type'];
        $inform_users->content = $data['content'];
        $inform_users->ctime = time();
        $inform_users->status = 1;
        $res = $inform_users->save();

        if($res){
            return redirect("home/personal/index/".$inform_users->inform_user)->with('success','举报成功');
        }else{
            return back()->with('error','举报失败');
        }
    }
    /**
     * 取消关注
     */
    public function care($id)
    {
           //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //获取 被关注的用户
        $data = Concern::where('users_id','=',$id)->orWhere('fans_id','=',$login_id)->first();

        $res = $data->delete();
         if($res){
            echo json_encode($data);
        }else{
            echo json_encode(['code'=>'error']);
        }
       
    }


    /**
     * 个人密码修改页面
     */
    public function pass($id)
    {   
        //获取修改用户原资料
        $users = Users::find($id);

          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //加载页面,分配数据
        return view('home.personal.pass',['title'=>'资料修改','users'=>$users,'login_id'=>$login_id]);
    }

    /**
     * 验证原密码
     */
    public function hold($pass)
    {
          //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //当前用户密码 是否与输入密码相一致
        if (Hash::check($pass,$login_id->upwd)) {
            echo json_encode(['code'=>'success']);
        } else {
             echo json_encode(['code'=>'error']);
        }

    }

    /**
     * 保存 个人密码修改 
     */
    public function save(Request $request)
    {
        //获取新密码
        $data = $request->only('repass');

         //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        //拿到当前用户
        $user = Users::find($login_id);
        $user->upwd = Hash::make($data['repass']);
        $res = $user->save();
        if($res){
            // 清除缓存 重新登录
            session(['login_users'=>null]);
            return redirect('/home/login/login')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

}
