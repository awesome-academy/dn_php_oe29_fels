<?php

namespace App\Models;

use App\User;
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
}
