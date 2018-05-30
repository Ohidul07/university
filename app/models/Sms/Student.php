<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';

    public function Programme(){

    	return $this->belongsTo('App\Programme','programme_type');
    }

    public function Session(){

    	return $this->belongsTo('App\Session','session');
    }

    public function Semester(){

    	return $this->belongsTo('App\Semester','semester');
    }
}
