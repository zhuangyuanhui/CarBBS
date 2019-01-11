<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";

    protected $primaryKey = "id";

    /**
     * 获取用户详细信息
     */
    public function getUserInfo()
    {
    	return $this->hasOne('App\models\home\UsersInfo','users_id'); 
    }

    /**
     * 获取用户的粉丝
     */
    public function users_fans()
    {
    	return $this->hasMany('App\models\home\Concern','users_id');
    }

    /**
     * 多对多模型关联,收藏文章
     */
    public function article()
    {
        return $this->belongsToMany('App\models\home\Article','users_article','users_id','article_id')->using('App\models\home\users_article');
    }

    /**
     * 多对多模型关联,收藏新闻
     */
    public function news()
    {
        return $this->belongsToMany('App\models\home\News','Users_News','users_id','news_id')->using('App\models\home\Users_News');
    }

    /**
     * 多对多模型关联,收藏车模
     */
    public function girls()
    {
        return $this->belongsToMany('App\models\admin\Girls','users_models','users_id','models_id')->using('App\models\home\users_models');
    }

    /**
     * 获取用户的关注
     */
    public function users_concern()
    {
        return $this->belongsToMany('App\models\home\Users','Concern','fans_id','users_id')->using('App\models\home\Concern');
    }
}
