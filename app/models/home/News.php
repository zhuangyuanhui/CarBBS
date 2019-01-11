<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $primaryKey = "id";

    //获取新闻类型
	public function getCate()
	{
        return $this->belongsTo('App\models\admin\Cates','cates_id');
	}
}
