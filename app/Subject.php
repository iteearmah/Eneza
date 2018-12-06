<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany('App\SubjectCourse', 'subject_id', 'id');
    }
}
