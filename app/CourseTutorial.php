<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTutorial extends Model
{
    protected $fillable = ['course_id', 'tutorial_id'];

    public function tutorials()
    {
        return $this->belongsTo('App\Tutorial', 'tutorial_id', 'id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }
}
