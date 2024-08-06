<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $tablename='categories';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'description','image'];
}
