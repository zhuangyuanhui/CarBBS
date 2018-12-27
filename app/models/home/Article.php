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
}
