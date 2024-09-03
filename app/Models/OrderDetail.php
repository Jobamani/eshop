<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class OrderDetail extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


 

}
