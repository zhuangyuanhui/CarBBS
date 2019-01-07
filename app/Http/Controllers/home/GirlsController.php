<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Girls;

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
    public function show($id)
    {
        //获取单个车模信息
        $girl = Girls::find($id);
        //添加浏览量
        $girl->clicks = $girl->clicks+1;
        $girl->save();
        // dump($girl);exit;  //测试拿到的值
        //获取所有车模信息  按时间进行倒序(最新发布的在前面)排列
        $all = Girls::orderBy('ctime','desc')->get();
        // 加载视图
        return view('home.girls.show',['title'=>'车模详情','girl'=>$girl,'all'=>$all]);
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
        if (!in_array($user->id, $zans)) {
            //增加点赞数
            $data->praise = $data->praise + 1;

            //将点赞用户ID追加进 文章表的已点赞用户列表中
            $data->inpraise .= $user->id.',';

            
            echo json_encode($data);
            
        }else{
            echo json_encode(['code'=>'error']);
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
}
