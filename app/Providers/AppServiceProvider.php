<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\models\home\Links;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      

        //获取友情链接
        $links = Links::all();

        //获取当前登录用户的id
        if(session('login_users')){
              $login_id = session('login_users')->id;
        }else{
              $login_id = null;
        }

        

        View::share(['links'=>$links,'login_id'=>$login_id]);
    }
 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
