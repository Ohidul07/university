<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class programme extends Model
{
    protected $table ='programmes';

    protected $fillable=  [
        'title',
        'programme_type',
        'semester_have',
        'created_by',
        'updated_by',
    ];

    public function student()
    {
    	return $this->hasMany('App\models\student','programme_id');
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
