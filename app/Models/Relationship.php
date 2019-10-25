<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationships';
    protected $fillable = [
        'follower_id',
        'followed_id',
    ];

    public function follower_user()
    {
        return $this->belongsTo(User::class,'follower_id','id');
    }

    public function followed_user()
    {
        return $this->belongsTo(User::class,'followed_id','id');
    }
}
