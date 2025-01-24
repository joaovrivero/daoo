<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'max_participants',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}


}
