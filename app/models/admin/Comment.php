<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $primaryKey = 'id';

    public function getUsers()
    {
    	return $this->belongsTo('App\models\home\Users','from_uid');
    }
    
}
