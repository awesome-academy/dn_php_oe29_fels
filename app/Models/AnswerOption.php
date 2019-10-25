<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    protected $table = 'answer_options';
    protected $fillable = [
        'content',
        'is_correct',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class,'answer_option_id','id');
    }
}
