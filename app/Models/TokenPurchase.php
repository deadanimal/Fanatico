<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id', 
        'user_id', 
        'amount',
    ];      
    
    public function token()
    {
        return $this->belongsTo(Token::class);
    }      

    public function user()
    {
        return $this->belongsTo(User::class);
    }  
    
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }     
}
