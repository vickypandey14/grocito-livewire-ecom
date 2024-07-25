<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    
    public function product_stock()
    {
        return $this->belongsTo(ProductStock::class,'variant_id','id'); 
    }
    
     public function seller()
    {
        return $this->belongsTo(Seller::class,'seller_id','id'); 
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id'); 
    }
}
