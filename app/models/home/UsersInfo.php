<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    protected $table = "users_info";

    protected $primaryKey = 'id';

    public function getUsers()
    {
    	return $this->belongsTo('App\models\home\Users','users_id');
    }
}
