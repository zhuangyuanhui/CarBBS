<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   	// 设置模型操作的表
    protected $table = 'article';

	// 设置模型操作的主键
    protected $primaryKey = 'id';

   	// 设置模型时间字段验证
	public $timestamps = true;
    
    //获取文章作者
	public function getName()
	{
		return $this->belongsTo('App\models\home\Users','users_id');
	}
    //获取文章类型
	public function getCate()
	{
        return $this->belongsTo('App\models\admin\Cates','cates_id');
	}

	//获取文章评论数量
	public function getComment()
	{
        return $this->hasOne('App\models\admin\Comment','article_id');
	}

	//获取文章云标签

}
