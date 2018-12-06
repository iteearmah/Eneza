<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectCourse extends Model
{
    protected $fillable = ['course_id', 'subject_id'];

    public function subjects()
    {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }
    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }
}
