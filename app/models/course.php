<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table='courses';

    protected $fillable = [

        'course_name',
        'course_code',
        'title',
        'semester',
        'course_credit',
        'course_type_id',
        'programme_id',
        'session_id',
        'course_syllabus',
        'course_syllabus_url',
        'created_by',
        'updated_by'
    ];
    

    public function createdBy()
    {
    	return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy()
    {
    	return $this->belongsTo('App\User','updated_by');
    }

    public function assignCourse()
    {
    	return $this->hasOne('App\models\assign_course','course_id');
    }

    public function courseType()
    {
    	return $this->belongsTo('App\models\course_type','course_type_id');
    }  

    public function programme()
    {
    	return $this->belongsTo('App\models\programmme','programme_id');
    }

    public function session()
    {
    	return $this->belongsTo('App\models\session','session_id');
    } 

    public function semester()
    {
    	return $this->belongsTo('App\models\semester','semester');
    }
}
