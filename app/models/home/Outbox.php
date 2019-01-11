<?php

namespace App\models\home;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    protected $table = "outbox";

    protected $primaryKey = "id";
}
