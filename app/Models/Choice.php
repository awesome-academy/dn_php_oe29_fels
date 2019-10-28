<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';
    protected $fillable = [
        'user_id',
        'question_id',
        'answer_option_id',
        'result',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function answer_option()
    {
        return $this->belongsTo(AnswerOption::class, 'answer_option_id', 'id');
    }
}
