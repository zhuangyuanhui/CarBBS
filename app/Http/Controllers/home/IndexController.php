<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Slides;
use App\models\admin\Label;
use App\models\admin\Cates;
use App\models\admin\Girls;
use App\models\admin\Advert;
use App\models\home\Article;
use App\models\home\Users;
use App\models\home\UsersInfo;

class IndexController extends Controller
{
	/**
	 * 加载前台首页
	 * @return [type] [description]
	 */
    public function index($id=0)
    {
    	//引入轮播图  已下架的不进行轮播
    	$slides = Slides::where('slides_status',1)->get();

    	//dump($label);exit;
    	//引入云标签 
    	$label = Label::limit(7)->get();

    	//引入分类
    	$cates = Cates::all();
    	// $arr = $cates->getArticle;
    	// dump($arr);exit;
    	// 
    	//引入文章    按分类查找  或者按云标签查找
    	if ($id == 0) {
    		$article = Article::all();
    	} else {
    		$article = Article::where('cates_id','=',$id)->orWhere('labels_id','=',$id)->get();

    	}

    	//排行   文章点赞量  用户积分量  车模浏览量
    	$rank_article = Article::orderBy('praise','desc')->limit(10)->get();
    	$rank_users = UsersInfo::orderBy('sign_number','desc')->limit(10)->get();
    	$rank_girls = Girls::orderBy('clicks','desc')->limit(10)->get();

    	// 引入用户
    	$users = Users::all();

        //引入广告位  投放状态  仅限一个
        $advert = Advert::where('astatus','=','0')->first();
    	
    	return view('home.index.index',[
	    								'title'=>'首页',
	    								'slides'=>$slides,
	    								'label'=>$label,
	    								'cates'=>$cates,
	    								'article'=>$article,
	    								'users'=>$users,
	    								'rank_article'=>$rank_article,
	    								'rank_users'=>$rank_users,
                                        'rank_girls'=>$rank_girls,
	    								'advert'=>$advert,
    								]);
    }

    /**
     * 显示分类后的文章
     */

    public function looks($id)
    {
    	//未完成
    	$data = Cates::find($id);
     	$arr = $data->getArticle;
     	foreach ($arr as $key => $value) {
     		
     	}
    	echo $arr;
    }
}
