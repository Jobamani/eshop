<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    protected $tablename='categories';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'description','image'];


    // Defining the relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
