<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function product_stock()
    {
        return $this->hasOne(ProductStock::class, 'product_id', 'id');
    }
    
    // public function product_stock()
    // {
    //     return $this->hasmany(ProductStock::class,'product_id','id'); 
    // }
    
    public function category()
    {
        return $this->belongsTo(Category::class,'categoryId','id'); 
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'subCategoryId','id'); 
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    
}
