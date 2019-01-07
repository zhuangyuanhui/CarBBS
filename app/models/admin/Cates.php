<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    // 设置模型操作的 表
    protected $table = 'cates';

	// 设置模型操作的主键
    protected $primaryKey = 'id';

   	// 设置模型时间字段验证
	public $timestamps = true;
	
	// 设置模型时间字段的存储格式
	//protected $dateFormat = 'U';
	
	//获取文章
	public function getArticle()
	{
        return $this->hasMany('App\models\home\Article','cates_id');
	}
}
