<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['title'];

    public function courses()
    {
        return $this->hasMany('App\CourseQuiz', 'course_id', 'id');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'quiz_questions');
    }
}
