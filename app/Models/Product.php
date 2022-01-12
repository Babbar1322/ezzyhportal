<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected $fillable = [
//        'name', 'detail', 'userid', 'brand', 'price', 'oldprice', 'description', 'image',
//    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
