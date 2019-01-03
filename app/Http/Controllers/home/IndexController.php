<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	/**
	 * 加载前台首页
	 * @return [type] [description]
	 */
    public function index()
    {
    	return view('home.index.index',['title'=>'首页']);
    }
}
