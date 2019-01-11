<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
use DB;
use App\models\home\Article;
use App\models\home\Concern;
use Hash;

class PersonalController extends Controller
{
    /**
     * 个人资料首页
     */
    public function index($id=0)
    {	 

        //如果id等于当前登录id,则获取自己的信息
    	if($id == 0){
    		$id = session('login_users')->id;
    	}
    	//获取当前登录用户的id
	    $login_id = session('login_users')->id;

        //获取对象id用户的信息
	    $users = Users::find($id);

    	return view('home.personal.index',['title'=>'个人资料','users'=>$users,'login_id'=>$login_id]);
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
	    $login_id = session('login_users')->id;

        //加载页面,分配数据
    	return view('home.personal.edit',['title'=>'资料修改','users'=>$users,'login_id'=>$login_id]);
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
        $login_id = session('login_users')->id;

        //获取个人的所有文章
        $articles = Article::where('users_id','=',$id)->get();
        //加载页面,分配数据
        return view('home.personal.article',['title'=>'个人文章','users'=>$users,'login_id'=>$login_id,'articles'=>$articles]);
    }

    /**
     * 个人空间收藏文章页面
     */
    public function users_articles()
    {   
        
        //获取当前登录用户的id
        $login_id = session('login_users')->id;
        //获取个人的所有文章
        $users = Users::where('id','=',$login_id)->first();

        //加载页面,分配数据
        return view('home.personal.users_articles',['title'=>'个人文章','users'=>$users,'login_id'=>$login_id,'article'=>$users->article]);
    }

    /**
     * 我的关注
     */
    public function concern($id=0)
    {
        //获取当前登录用户的id
        $login_id = session('login_users')->id;

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
     * 我的粉丝
     */
    public function fans()
    {

    }
    /**
     * 取消关注
     */
    public function care($id)
    {
         //获取当前登录用户的id
        $login_id = session('login_users')->id;

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
        $login_id = session('login_users')->id;

        //加载页面,分配数据
        return view('home.personal.pass',['title'=>'资料修改','users'=>$users,'login_id'=>$login_id]);
    }

    /**
     * 验证原密码
     */
    public function hold($pass)
    {
        //获取当前登录用户
        $login_id = session('login_users');

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

        //获取当前用户id
        $login_id = session('login_users')->id;

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
