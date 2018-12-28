<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";

    protected $primaryKey = "id";

    public function getUserInfo()
    {
    	return $this->hasOne('App\models\home\UsersInfo','users_id'); 
    }
}
