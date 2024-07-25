<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
   public function user()
    {
        return $this->belongsTo(User::class); 
    } 
    
    public function pincode_data()
    {
        return $this->belongsTo(Pincode::class,'pincode','pincode'); 
    } 
 
}
