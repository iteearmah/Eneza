<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['question_id', 'content', 'correct'];

    public function question()
    {
        return $this->belongsTo('App\Tutorial', 'id', 'question_id');
    }
}
