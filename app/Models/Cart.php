<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'seller_id',
        'product_id',
        'variant_id',
        'quantity'
    ];
    
     public function product_stock()
    {
        return $this->belongsTo(ProductStock::class,'variant_id','id'); 
    }
    
     public function seller_deatil_data()
    {
        return $this->belongsTo(Seller::class,'seller_id','id'); 
    }
    
    
}
