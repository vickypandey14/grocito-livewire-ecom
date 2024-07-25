<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturnReplaceRequest extends Model
{
      public function user()
    {
        return $this->belongsTo(User::class); 
    }
    
      public function seller()
    {
        return $this->belongsTo(Seller::class,'staff_id','id'); 
    }
    
    public function delivery_partner()
    {
        return $this->belongsTo(DeliveryPartners::class,'delivery_partner_id','id'); 
    }
}
