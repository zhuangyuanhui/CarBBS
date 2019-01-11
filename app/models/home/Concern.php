<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Concern extends Pivot
{
    protected $table = "concern";

    protected $primaryKey = "id";
}
