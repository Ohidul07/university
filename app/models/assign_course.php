<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class assign_course extends Model
{
    protected $table='assign_courses';
    protected $fillable=[
        'course_id',
        'teacher_id',
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

    public function teacher()
    {
    	return $this->belongsTo('App\models\teacher','teacher_id');
    }

    public function course()
    {
    	return $this->belongsTo('App\models\course','course_id');
    }
}
