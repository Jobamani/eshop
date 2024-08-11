<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $tablename='products';
    protected $primarykey = 'id';
    protected $fillable = ['name','description','category','image','Mrp_price','selling-price'];

    // Defining the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
