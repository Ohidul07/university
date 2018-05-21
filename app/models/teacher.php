<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $table ='teachers';

    protected $fillable=  [

        'user_id',
    ];

    public function courses()
    {
    	return $this->hasMany('App\models\course','teacher_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User',);
    }

}
