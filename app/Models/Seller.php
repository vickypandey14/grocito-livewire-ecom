<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    
    public function business_category()
    {
        return $this->belongsTo(BusinessCategory::class,'category'); 
    }
    
    public function seller_shipping()
    {
        return $this->hasMany(SellerShipping::class,'seller_id'); 
    }

    public function store_timing()
    {
        return $this->hasMany(StoreTiming::class,'seller_id'); 
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id'); 
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id', 'id');
    }
    
}
