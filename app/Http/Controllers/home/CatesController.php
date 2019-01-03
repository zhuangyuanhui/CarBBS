<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Cates;

class CatesController extends Controller
{

	/**
	 * 获取新闻列表分类
	 * @return [type] [description]
	 */

    static function getCatesFour()
    {
    	$cates_four = Cates::orderBy('ctime','desc')->limit(4)->get();

    	return $cates_four;
    }
}
