<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
     protected $table ='course_marks';

    public function User(){

    	return $this->belongsTo('App\User','student_id');
    }

    public function Course()
    {
    	return $this->belongsTo('App\course','course_id');
    }
}
