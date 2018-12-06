<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = ['content'];

    public function courses()
    {
        return $this->hasMany('App\CourseTutorial', 'course_id', 'id');
    }
}
