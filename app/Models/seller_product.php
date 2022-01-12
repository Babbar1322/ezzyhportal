<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller_product;

class seller_product extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function seller_proudcts()
    {
        return $this->belongsToMany(seller_product::class);
    }

}
