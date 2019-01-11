<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Girls;
use App\models\home\users_models;

class GirlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有车模信息  按时间进行倒序(最新发布的在前面)排列
        $girls = Girls::orderBy('ctime','desc')->paginate(8);
        
        //加载车模列表视图
        return view('home.girls.index',['title'=>'车模列表','girls'=>$girls]);
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
    public function show(Request $request, $id)
    {
        //获取单个车模信息
        $girl = Girls::find($id);
        //添加浏览量
        $girl->clicks = $girl->clicks+1;
        $girl->save();
        // dump($girl);exit;  //测试拿到的值
        //获取所有车模信息  按时间进行倒序(最新发布的在前面)排列
        $all = Girls::orderBy('ctime','desc')->get();

        

        //判断用户是否登录
        if ($request->session()->exists('users')) {
                //判断该车模是否被该用户收藏,设置标志符
                $users_id  = session('login_users')->id;
                if(users_models::where('users_id',$users_id)->where('models_id',$id)->first()){
                    $flag = 1;
                } else {
                    $flag = 2;
                }
        } else { 
             $flag = 3;
        }

        //获取该文章被收藏量
        //$num = users_models::where('models_id',$id)->count();
        

        
        // 加载视图
        return view('home.girls.show',['title'=>'车模详情','girl'=>$girl,'all'=>$all,'flag'=>$flag]);
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

    /**
     * 
     */
    public function zan($id)
    {
        //获取登录的用户
        $user = session('login_users');

        //获取被点赞的文章
        $data = Girls::find($id);

        //将点赞用户的id 拆分成数组
         $zans = explode(',',rtrim($data->inpraise,','));

         //判断点赞用户 是否存在点赞用户列表中
        if (!in_array($user->id,$zans)) {
            //增加点赞数
            $data->praise = $data->praise + 1;

            //将点赞用户ID追加进 文章表的已点赞用户列表中
            $data->inpraise .= $user->id.',';

            $data->save();
            echo json_encode(['code'=>'success','msg'=>'成功点赞']);
            
        }else{
            echo json_encode(['code'=>'error','msg'=>'已成功点赞,请勿重复点赞']);
        }
    }


    /**
     * 根据浏览量排序,拿20条数据用于排行榜
     */
    static public function clicks_girls()
    {
        $clicks_girls = Girls::orderBy('clicks','desc')->limit(20)->get();

        return $clicks_girls;
    }

    /**
     * 根据点赞量排序,拿20条数据用于排行榜
     */
    static public function praise_girls()
    {
        $praise_girls = Girls::orderBy('praise','desc')->limit(20)->get();

        return $praise_girls;
    }

    /**
     * 文章收藏
     */
    public function collect($id)
    {
        $user_id  = session('login_users')->id;

        $shoucang = users_models::where('users_id',$user_id)->where('models_id',$id)->first();

        if($shoucang){
            $res = $shoucang->delete();
                if($res){
                    echo json_encode(['code'=>'success','type'=>'quxiao']);
                }else{
                    echo json_encode(['code'=>'error','type'=>'quxiao']);
                }
        } else {
            $users_models = new users_models;
            $users_models->users_id = $user_id;
            $users_models->models_id = $id;
            $users_models->ctime = time();
            $res = $users_models->save();
                if($res){
                   echo json_encode(['code'=>'success','type'=>'shoucang']);
                } else {
                    echo json_encode(['code'=>'error','type'=>'shoucang']);
                }
        }

    }
}
