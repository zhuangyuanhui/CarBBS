<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\home\UsersController;

class RankController extends Controller
{
    public function index($type = 1)
    {	
    	switch ($type) {
    		case 1:
    				//获取积分用户排行
    				$data = UsersController::number_users();
    			break;
    		case 2:
    				//获取粉丝量用户排行
    				$data = UsersController::fans_users();
    			break;
    		case 3:
    				//获取发帖量用户排行
    				$data = UsersController::article_users();
    			break;
    		case 4:
    				//获取连续签到天数用户排行
    				$data = UsersController::sign_users();
    			break;
    		default:
    				//获取积分用户排行
    				$data = UsersController::number_users();
    			break;
    	}
    	

    	return view('home.rank.index',['title'=>'排行榜','data'=>$data]);
    }
}
