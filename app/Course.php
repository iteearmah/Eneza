<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name'];

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'subject_courses');
    }

    public function quizzes()
    {
        return $this->belongsToMany('App\Quiz', 'course_quizzes');
    }

    public function tutorials()
    {
        return $this->belongsToMany('App\Tutorial', 'course_tutorials');
    }
}
