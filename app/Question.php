<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content'];

    public function quizzes()
    {
        return $this->hasMany('App\CourseQuiz', 'quiz_id', 'id');
    }

    public function choices()
    {
        return $this->hasMany('App\Choice', 'question_id', 'id');
    }

}
