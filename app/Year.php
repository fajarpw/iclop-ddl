<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';

    protected $fillable = [
        'name', 'start_date', 'end_date','status,'
    ];
}
