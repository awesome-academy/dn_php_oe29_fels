<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'id',
        'user_id',
        'action_type',
        'action_id',
    ];
}
