<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = "reply";

    protected $primaryKey = 'id';

    public function getUsers()
    {
    	return $this->belongsTo('App\models\home\Users','from_uid');
    }
}
