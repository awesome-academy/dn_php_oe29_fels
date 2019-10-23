<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
        'type',
        'lesson_id',
    ];

    public function answer_options()
    {
        return $this->hasMany(AnswerOption::class,'question_id','id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class,'question_id','id');
    }
}
