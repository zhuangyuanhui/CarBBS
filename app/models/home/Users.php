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
}
