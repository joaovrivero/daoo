<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'start_time', 
        'end_time', 
        'max_participants'
    ];
}
