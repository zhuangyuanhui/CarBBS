<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class InformUsers extends Model
{
    protected $table = "inform_users";

    protected $primaryKey = "id";

    //获取举报人信息
    public function getUsers()
    {
    	return $this->belongsTo('App\models\home\Users','users_id');
    }

    //获取被举报人信息
     public function getInformUsers()
    {
    	return $this->belongsTo('App\models\home\Users','inform_user');
    }
}

