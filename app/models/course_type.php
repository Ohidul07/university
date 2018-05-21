<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class course_type extends Model
{
    protected $table ='course_types';

    protected $fillable=  [
        'title',
        'created_by',
        'updated_by',
    ];

    public function course()
    {
    	return $this->hasMany('App\models\course','course_type_id');
    }

    public function createdBy()
    {
    	return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy()
    {
    	return $this->belongsTo('App\User','updated_by');
    }
}
