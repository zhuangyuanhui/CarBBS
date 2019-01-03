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



























/*------------------------------------------------------------  zhangjianjun 104 ----------------------------------------------*/

Route::resource('admin/cates','admin\CatesController');   //后台类别管理
Route::resource('admin/links','admin\LinksController');   //友情链接管理
Route::resource('admin/basics','admin\BasicsController');   //网站基本配置管理
Route::resource('admin/areports','admin\AreportsController');   //文章举报管理
// 未完成页面  缺少用户  无法点赞
Route::get('home/girls/zan/{id}','home\GirlsController@zan');   //前台车模点赞  
Route::resource('home/girls','home\GirlsController');   //前台车模列表

Route::get('home/index','home\IndexController@index');   //前台首页








































/*------------------------------------------------------------  shaomingshuo 155 ----------------------------------------------*/



















































