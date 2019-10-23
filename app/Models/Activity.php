<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'action_type',
        'action_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
