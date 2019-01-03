<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class InformArticle extends Model
{
    // 设置模型操作的 表
    protected $table = 'inform_article';

	// 设置模型操作的主键
    protected $primaryKey = 'id';

   	// 设置模型时间字段验证
	public $timestamps = true;

	// 配置 一对多  前台用户 (举报人进行举报文章)
   	public function userarticles()
   	{
   		return $this->belongsTo('App\models\home\Users','users_id');
   	}

	// 配置 一对多  文章表  举报
   	public function articlesuser()
   	{
   		return $this->belongsTo('App\models\home\Article','article_id');
   	}
}
