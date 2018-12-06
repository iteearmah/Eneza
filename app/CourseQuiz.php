<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseQuiz extends Model
{
    protected $fillable = ['quiz_id', 'course_id'];

    public function quizzes()
    {
        return $this->belongsTo('App\Quiz', 'tutorial_id', 'id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }
    
}
