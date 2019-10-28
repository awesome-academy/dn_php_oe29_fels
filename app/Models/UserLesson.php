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
}
