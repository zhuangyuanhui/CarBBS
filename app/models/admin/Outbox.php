<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    protected $table = 'outbox';

    protected $primaryKey = 'id';
}
