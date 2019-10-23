<?php

namespace App;

use App\Models\Activity;
use App\Models\Choice;
use App\Models\Lesson;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class,'user_id','id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class,'user_id','id');
    }

    public function followers()
    {
        return $this->hasMany(Relationship::class,'follower_id','id');
    }

    public function followeds()
    {
        return $this->hasMany(Relationship::class,'followed_id','id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class,'user_lessons','user_id','lesson_id','id');
    }
}
