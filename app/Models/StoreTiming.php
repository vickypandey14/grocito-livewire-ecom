<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreTiming extends Model
{
    use HasFactory;
    
   protected $fillable = [
        'seller_id',
        'day',
        'open_time',
        'close_time',
        'status'
    ];
    
}
