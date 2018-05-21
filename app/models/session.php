<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $table ='sessions';

    protected $fillable=  [
        'title',
        'session_type',
        'created_by',
        'updated_by',
    ];

    public function student()
    {
    	return $this->hasMany('App\models\student','session_id');
    }

    public function course()
    {
    	return $this->hasMany('App\models\course','session_id');
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
