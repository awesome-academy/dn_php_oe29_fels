<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    protected $fillable = [
        'title',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class,'lesson_id','id');
    }

    public function user_lessons()
    {
        return $this->hasMany(UserLesson::class,'lesson_id','id');
    }
}
