<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Basics extends Model
{
    // 设置模型操作的 表
    protected $table = 'basic';

	// 设置模型操作的主键
    protected $primaryKey = 'id';

   	// 设置模型时间字段验证
	public $timestamps = true;
}
