<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Users as adminUsers;
use App\models\admin\Cates;
use App\models\admin\Girls;
use App\models\admin\Label;
use App\models\admin\Links;
use App\models\admin\News;
use App\models\admin\Comment;
use App\models\admin\InformArticle;
use App\models\admin\Basics;
use App\models\admin\Advert;
use App\models\admin\Slides;
use App\models\home\Users as homeUsers;
use App\models\home\Inform_Users;
use App\models\home\Article;
class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //后台用户 数量
        $users = adminUsers::count();

        //后台分类 数量
        $cates = Cates::count();

        //后台车模 数量
        $girls = Girls::count();

        //后台云标签 数量
        $label = Label::count();

        //后台友情链接 数量
        $links = Links::count();

        //后台新闻 数量
        $news = News::count();

        //后台评论管理 数量
        $comment = Comment::count();

        //后台文章举报 数量
        $inform_article = InformArticle::count();

        //后台网络配置 数量
        $basic = Basics::count();

        //后台广告位 数量
        $advert = Advert::count();


        //后台轮播图 数量
        $slides = Slides::count();

        //前台用户 数量
        $user = homeUsers::count();

        //前台用户举报 数量
        $inform_users= Inform_Users::count();


        //前台文章 数量
        $article= Article::count();


        // dump($users);exit;
        return view('admin.layout.layout',[
                                'title'=>'爱车网后台管理系统',
                                'users'=>$users,
                                'cates'=>$cates,
                                'girls'=>$girls,
                                'label'=>$label,
                                'links'=>$links,
                                'news'=>$news,
                                'comment'=>$comment,
                                'inform_article'=>$inform_article,
                                'basic'=>$basic,
                                'advert'=>$advert,
                                'slides'=>$slides,
                                'user'=>$user,
                                'inform_users'=>$inform_users,
                                'article'=>$article,
                                ]);
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
        //
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
}
