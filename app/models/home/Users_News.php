<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Users_News extends Pivot
{
   protected $table = "users_news";

    protected $primaryKey = "id";

}
