<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    // 设置模型操作的表
    protected $table = 'label';


	// 设置模型操作的主键
    protected $primaryKey = 'id';

    public function getCates()
    {
    	return $this->belongsTo('App\models\admin\Cates','cates_id');
    }

}
