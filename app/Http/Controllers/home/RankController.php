<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\home\UsersController;
use App\Http\Controllers\home\NewsController;
use App\Http\Controllers\home\GirlsController;
use App\Http\Controllers\home\ArticlesControlle;

class RankController extends Controller
{   
    /**
     * 用户排行榜系列
     */
    public function index($type=0)
    {	
    	switch ($type) {
    		case 0:
    				//获取积分用户排行
    				$data = UsersController::number_users();
    			break;
    		case 1:
    				//获取粉丝量用户排行
    				$data = UsersController::fans_users();
    			break;
    		case 2:
    				//获取发帖量用户排行
    				$data = UsersController::article_users();
    			break;
    		case 3:
    				//获取连续签到天数用户排行
    				$data = UsersController::sign_users();
    			break;
    		default:
    				//获取积分用户排行
    				$data = UsersController::number_users();
    			break; 
    	}
        // foreach($data as $key=>$value){

        //     foreach($value->users_fans as $k=>$v){

        //         dump($v->fans_id);exit;
        //     }
        // }


        $self = session('login_users')->id;

    	return view('home.rank.index',['title'=>'用户排行榜','data'=>$data,'type'=>$type,'self'=>$self]);
    }


    /**
     * 新闻排行榜系列
     */
    public function news($type=0)
    {
        if($type == 0){
            //按照浏览量排序获取数据
            $data = NewsController::clicks_new();
        }else{
            //按照点赞量排序获取数据
            $data = NewsController::praise_new();
        }
        
        return view('home.rank.news',['title'=>'新闻排行榜','data'=>$data,'type'=>$type]);
    }

    /**
     * 车模排行榜系列
     */
    public function girls($type=0)
    {
        if($type == 0){
            //按照浏览量排序获取数据
            $data = GirlsController::clicks_girls();
        }else{
            //按照点赞量排序获取数据
            $data = GirlsController::praise_girls();
        }
        
        return view('home.rank.girls',['title'=>'车模排行榜','data'=>$data,'type'=>$type]);
    }


    /**
     * 文章排行榜系列
     */
    public function articles($type=0)
    {
        if($type == 0){
            //按照浏览量排序获取数据
            $data = ArticlesControlle::clicks_article();
        }else{
            //按照点赞量排序获取数据
            $data = ArticlesControlle::praise_article();
        }
        
        return view('home.rank.article',['title'=>'文章排行榜','data'=>$data,'type'=>$type]);
    }
}
 