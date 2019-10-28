<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLesson extends Model
{
    protected $table = 'user_lessons';
    protected $fillable = [
        'user_id',
        'lesson_id',
        'status',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
