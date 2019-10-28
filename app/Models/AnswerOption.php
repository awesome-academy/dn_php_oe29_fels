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
}
