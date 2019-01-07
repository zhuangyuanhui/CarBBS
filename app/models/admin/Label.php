<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    // 设置模型操作的表
    protected $table = 'label';


	// 设置模型操作的主键
    protected $primaryKey = 'id';

    //通过标签找文章
     public function labelarticle()
    {
        return $this->hasMany('App\models\home\Article','labels_id');
    }
}
