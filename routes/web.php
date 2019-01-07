<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 *  	目录名称一律小写    控制器双驼峰命名法(加 s )    模型名称首字母大写(加 s ) 
 *		函数与方法名大括号一律换行 (推荐使用 Tab 键补全)	名称使用单驼峰命名法
 *		for foreach 大括号不换行  (推荐使用 Tab 键补全)
 *		每段较大的程序体,上下之间加一个空行
 *		类名由多个单词组成的,首字母大写,中间加 _ ;例( User_info )
 *		注释规范( 方法体上方多行注释	方法体内单行注释	 路由必须添加注释		在每个文件首部增加注释说明)
 */

























/*------------------------------------------------------------  zhuangyuanhui 52 ----------------------------------------------*/


Route::resource('admin/news','admin\NewsController');		//后台新闻管理
Route::resource('admin/girls','admin\GirlsController');		//后台车模管理
Route::resource('admin/label','admin\LabelController');		//后台云标签管理
Route::resource('admin/husers','admin\HUsersController');     	//前台用户后台管理
Route::resource('admin/reports','admin\ReportsController');		//用户举报后台管理
Route::resource('admin/comment','admin\CommentsController');	//评论后台管理


Route::get('home/users/send/{tel}','home\UsersController@sendTelCode');     //发送手机号验证码
Route::get('home/users/checkname/{name}','home\UsersController@checkname');     //注册页面ajax检测用户是否存在
Route::get('home/users/checktel/{tel}','home\UsersController@checktel');     //注册页面ajax检测手机号是否已注册
Route::resource('home/users','home\UsersController');		//前台用户页面

Route::get('home/login/login','home\LoginController@login');	//前台用户登录
Route::get('home/login/checkphone/{phone}','home\LoginController@checkphone');	//登陆检测用户是否存在
Route::post('home/login/dologin','home\LoginController@dologin');		//前台用户提交登陆

Route::get('home/login/forget','home\LoginController@forget');		//用户忘记密码修改页面
Route::get('home/login/checkname/{name}','home\LoginController@checkname');	//前台用户忘记密码检测用户是否存在
Route::get('home/login/checktel/{tel}','home\LoginController@checktel');	//前台用户忘记密码检测手机号是否正确
Route::get('home/login/send/{tel}','home\LoginController@sendTelCode');     //发送手机号验证码
Route::post('home/login/alert','home\LoginController@alert');		//修改用户密码

Route::get('home/news/index/{id}','home\NewsController@index');        //前台页面新闻列表

Route::get('home/rank/index/{type}','home\RankController@index');			//前台排行页面























/*------------------------------------------------------------  zhangjianjun 104 ----------------------------------------------*/

Route::resource('admin/cates','admin\CatesController');   //后台类别管理
Route::resource('admin/links','admin\LinksController');   //友情链接管理
Route::resource('admin/basics','admin\BasicsController');   //网站基本配置管理
Route::resource('admin/areports','admin\AreportsController');   //文章举报管理
// 未完成页面  缺少用户  无法点赞
Route::get('home/girls/zan/{id}','home\GirlsController@zan');   //前台车模点赞  
Route::resource('home/girls','home\GirlsController');   //前台车模列表

Route::get('home/index','home\IndexController@index');   //前台首页
Route::get('/home/index/{id}','home\IndexController@index');   //前台首页







































/*------------------------------------------------------------  shaomingshuo 155 ----------------------------------------------*/
Route::get('admin/users/sendemail/{email}','admin\UsersController@sendEmailCode');     //发送邮箱验证码
Route::get('admin/loginout','admin\LoginController@loginout');                         //退出登录
Route::get('admin/login/forget','admin\LoginController@forget');                       //忘记密码                 
Route::get('admin/login/sendemail/{email}','admin\LoginController@sendEmailCode');     //发送邮箱验证码
Route::get('admin/login/reset','admin\LoginController@reset');                         //跳转修改密码
Route::get('admin/layout','admin\LayoutController@index');                             //后台主页面
Route::get('home/articles/click','home\ArtRankController@click');                      //根据点击量进行排行
Route::get('home/articles/time','home\ArtRankController@time');                        //根据时间进行排行
Route::get('home/articles/praise','home\ArtRankController@praise');                    //根据点赞进行排行




Route::post('admin/login/check','admin\LoginController@check');                        //检查登录
Route::post('admin/login/checkemail','admin\LoginController@checkemail');              //审查邮箱                 
Route::post('admin/login/changepwd','admin\LoginController@changepwd');


Route::get('home/articles/{id}','home\ArticlesControlle@index');                       //前台文章分类排行


Route::resource('admin/users','admin\UsersController');                                //后台用户路由
Route::resource('admin/adverts','admin\AdvertsController');                            //广告位路由
Route::resource('admin/slides','admin\SlidesController');                              //轮播图路由  
Route::resource('admin/articles','admin\HArticlesController')->middleware('login');    //后台文章管理
Route::resource('admin/login','admin\LoginController');                                //后台登录管理
Route::resource('home/layout','home\LayoutControlle');                                 //Layout图路由 


//home
Route::resource('home/articles','home\ArticlesControlle');                            //前台用户路由














































