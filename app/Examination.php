<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $table='examinations';

    public function Programme(){

    	return $this->belongsTo('App\Programme','programme_type');
    }

    public function Session(){

    	return $this->belongsTo('App\Session','session');
    }

    public function Year(){

    	return $this->belongsTo('App\Year','year');
    }

    public function Semester(){

    	return $this->belongsTo('App\Semester','semester');
    }
}
