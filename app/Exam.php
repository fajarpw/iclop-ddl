<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'year_id','name', 'description',
    ];

    public function year()
    {
        return $this->belongsTo('App\Year', 'year_id');
    }
}
