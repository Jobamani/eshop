<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message'];

    protected $casts = [
        'user_id' => 'array', // Cast the user_id as an array
    ];
}
