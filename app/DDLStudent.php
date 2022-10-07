<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DDLStudent extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'class_id', 'student_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'student_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo('App\DDLClass', 'class_id', 'id');
    }
}
