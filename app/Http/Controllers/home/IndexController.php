<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Slides;
use App\models\admin\Label;
use App\models\admin\Cates;
use App\models\admin\Girls;
use App\models\home\Article;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\home\Links;

class IndexController extends Controller
{
	/**
	 * 加载前台首页
	 * @return [type] [description]
	 */
    public function index($id=0)
    {   
        //判断当前用户是否登录,并取其id值
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }


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

        //对文章内容的p标签和img标签进行处理
        foreach($article as $k=>$v){

            // 2.正则表达式 s让.可以匹配换行符
            $ptn = '/<img.*?src="(.*?)".*?>/s'; 
            $ptn2 = '/<p>(.*?)<\/p>/s';
            //正则替换去除img标签
            $v->content = preg_replace($ptn, '', $v->content); 
            $v->content = preg_replace($ptn2, '$1', $v->content); 
    	} 

    	//排行   文章点赞量  用户积分量  车模浏览量
    	$rank_article = Article::orderBy('praise','desc')->limit(10)->get();

         foreach($rank_article as $k=>$v){

            // 2.正则表达式 s让.可以匹配换行符
            $ptn = '/<img.*?src="(.*?)".*?>/s'; 
            $ptn2 = '/<p>(.*?)<\/p>/s';
            //正则替换去除img标签
            $v->content = preg_replace($ptn, '', $v->content); 
            $v->content = preg_replace($ptn2, '$1', $v->content); 
        }

    	$rank_users = UsersInfo::orderBy('sign_number','desc')->limit(10)->get();
    	$rank_girls = Girls::orderBy('clicks','desc')->limit(10)->get();

        //获取友情链接
        $links = Links::all();

    	// 引入用户
    	$users = Users::all();
    	
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
                                        'links' => $links
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

    /**
     * 关于我们页面
     */
    public function andme()
    {
        return view('home.index.andme',['title'=>'关于我们']);
    }
}
