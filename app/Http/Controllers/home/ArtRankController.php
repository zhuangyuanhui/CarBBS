<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Article;

class ArtRankController extends Controller
{
     /**
     * Remove the specified resource from storage.
     * 限定时间进行排行
     * @return \Illuminate\Http\Response
     */
    public function ontime()
    {
    }     
    /**
     * Remove the specified resource from storage.
     * 根据点击量进行排行
     * @return \Illuminate\Http\Response
     */
    static function click()
    {

        $data = Article::orderBy('clicks','desc')->limit(10)->get();
        return $data;
    }   

    /**
     * Remove the specified resource from storage.
     * 根据时间进行排行
     * @return \Illuminate\Http\Response
     */
    static function time()
    {
        $data = Article::orderBy('ctime','desc')->limit(10)->get();
        return $data;
    }  

    /**
     * Remove the specified resource from storage.
     * 根据点赞进行排行
     * @return \Illuminate\Http\Response
     */
    static function praise()
    {
        $data = Article::orderBy('praise','desc')->limit(10)->get();
        return $data;
    } 


}
