<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class users_article extends Pivot
{
    protected $table = "users_article";

    protected $primaryKey = 'id';
}