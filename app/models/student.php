<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table ='students';

    protected $fillable=  [
        'first_name',
        'last_name',
        'student_id',
        'phone_no',
        'fb_link',
        'email',
        'password',
        'photo_url',
        'gender',
        'blood_group',
        'present_address',
        'parmanent_address',
        'parent_phone_no',
        'start_date',
        'end_date',
        'programme_id',
        'session-id',
        'created_by',
        'updated_by',
    ];

    public function programme()
    {
    	return $this->belongsTo('App\models\programmes','programme_id');
    }

    public function session()
    {
    	return $this->belongsTo('App\models\sessions','session_id');
    }

    public function createdBy()
    {
    	return $this->belongsTo('App\User','created_by');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function updatedBy()
    {
    	return $this->belongsTo('App\User','updated_by');
    }
}
