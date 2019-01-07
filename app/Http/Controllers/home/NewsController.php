<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\News;
use App\Http\Controllers\home\CatesController;
use App\models\home\Cates;

class NewsController extends Controller
{	
	/**
	 * 
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
<<<<<<< HEAD
     * 新闻详情
     */
    public function details($id)
    {
        //获取新闻详情信息
        $new      = News::where('id',$id)->first();
        //获取相同类别文章
        $cate_new = News::where('cates_id',$new->cates_id)->orderBy('clicks','desc')->limit(10)->get(); 
        return view('home.news.details',
                                      [
                                        'cate_new'=>$cate_new,
                                        'new'=>$new,
                                        'title'=>'新闻详情'
                                      ]);

=======
     * 根据浏览量排序,拿20条数据用于排行榜
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
>>>>>>> car/zhuang
    }
}
