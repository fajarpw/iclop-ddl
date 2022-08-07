<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DDLClass extends Model
{
    protected $table = 'class';

    protected $fillable = [
        'year_id', 'teacher_id', 'name',
    ];

    public function year()
    {
        return $this->belongsTo('App\Year', 'year_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id', 'id');
    }
}
