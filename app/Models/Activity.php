<?php

namespace App\Models;

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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function user_action()
    {
        return $this->belongsTo(User::class,'action_id','id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class,'action_id','id');
    }
}
