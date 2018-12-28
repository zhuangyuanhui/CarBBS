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

Route::resource('home/users','home\UsersController');		//前台用户页面

Route::get('home/users/send/{tel}','home\UsersController@sendTelCode');     //发送手机号验证码

Route::get('home/users/checkname/{name}','home\UsersController@checkname');     //注册页面ajax检测用户是否存在

Route::get('home/users/checkcode/{tel_code}','home\UsersController@checkcode');     //注册页面ajax检测验证是否正确

Route::resource('admin/husers','admin\HUsersController');




































/*------------------------------------------------------------  zhangjianjun 104 ----------------------------------------------*/

Route::resource('admin/cates','admin\CatesController');   //后台类别管理
Route::resource('admin/links','admin\LinksController');   //友情链接管理
Route::resource('admin/basics','admin\BasicsController');   //网站基本配置管理














































/*------------------------------------------------------------  shaomingshuo 155 ----------------------------------------------*/

Route::resource('admin/users','admin\UsersController');                                //后台用户路由
Route::get('admin/users/sendemail/{email}','admin\UsersController@sendEmailCode');     //发送邮箱验证码
Route::resource('admin/adverts','admin\AdvertsController');                            //广告位路由
Route::resource('admin/slides','admin\SlidesController');                              //轮播图路由  
Route::resource('home/layout','home\LayoutControlle');                                 //Layout图路由  








//home
Route::resource('home/articles','home\ArticlesControlle');                       //后台用户路由
Route::resource('admin/articles','admin\HArticlesController');

















































