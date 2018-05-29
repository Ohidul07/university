<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table= 'courses';

    public function Semester()
    {
    	return $this->belongsTo('App\Semester','semester');
    }

    public function CourseType()
    {
    	return $this->belongsTo('App\CourseType','course_type');
    }

    public function ProgrammeType(){
    	return $this->belongsTo('App\Programme','programme_type');
    }
}
