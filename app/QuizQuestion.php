<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = ['question_id', 'quiz_id'];

    public function quizzes()
    {
        return $this->belongsTo('App\Quiz', 'quiz_id', 'id');
    }

    public function questions()
    {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }
}
