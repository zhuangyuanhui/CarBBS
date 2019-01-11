<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $primaryKey = 'id';

    /**
     * 或者评论者信息
     */
    public function getUsers()
    {
    	return $this->belongsTo('App\models\home\Users','from_uid');
    }

    /**
     * 获取被评论文章标题
     */
    public function getArticle()
    {
    	return $this->belongsTo('App\models\home\Article','article_id');
    }
    
}
