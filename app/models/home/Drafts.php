<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class Drafts extends Model
{
    protected $table = "drafts";

    protected $primaryKey = "id";

    //获取文章类型
	public function getCates()
	{
        return $this->belongsTo('App\models\admin\Cates','cates_id');
	}
}
