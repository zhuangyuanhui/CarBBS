<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class users_models extends Pivot
{
    protected $table = "users_models";

    protected $primaryKey = 'id';
}
