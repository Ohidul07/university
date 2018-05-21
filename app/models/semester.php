<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $table ='semesters';

    protected $fillable=  [
        'title',
        'semester_id',
    ];
}
