<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class News_Comment extends Model
{
    protected $table = "news_comment";

    protected $primaryKey = "id";  

    /**
     * 用评论表的评论者id获取评论者用户信息,
     */
    public function getUsers()
    {
    	return $this->belongsTo('App\models\home\Users','from_uid');
    }
    
    /**
     * 用评论表的新闻id获取新闻标题
     */
     public function getNews()
    {
    	return $this->belongsTo('App\models\home\News','news_id');
    }
}
