<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // 设置模型操作的 表
    protected $table = 'news';


	// 设置模型操作的主键
    protected $primaryKey = 'id';


   	// 设置模型时间字段验证
	public $timestamps = true;
	
	// 设置模型时间字段的存储格式
	//protected $dateFormat = 'U';
	//属于
    public function newcates()
    {
        return $this->belongsTo('App\models\admin\Cates','cates_id');
    }
}
