<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'description',
        'image_url',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class,'course_id','id');
    }
}
