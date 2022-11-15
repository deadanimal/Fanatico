<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',          
        'status',
        'price',
        'currency',
        'bitpay_id'
    ];    
    
    public function token_purchase()
    {
        return $this->belongsTo(TokenPurchase::class);
    }       
}
