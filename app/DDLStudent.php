<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DDLStudent extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'class_id', 'student_id',
    ];
}
