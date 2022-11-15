<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id', 
        'user_id', 
        'balance',
    ];      
}
