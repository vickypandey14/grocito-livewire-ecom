<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'status',
    ];
    
    public function seller()
    {
        return $this->hasMany(Seller::class,'category','id'); 
    }
    
    public function sellerData()
    {
        return $this->belongs(Seller::class,'category','id'); 
    }
    
}
