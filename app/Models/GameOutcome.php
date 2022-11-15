<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameOutcome extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'game_match_id',
        'user_id',  
        'token_id',
        'token_min_amount',         
    ];      

    public function game_match()
    {
        return $this->belongsTo(GameMatch::class);
    }   

    public function positions()
    {
        return $this->hasMany(GamePosition::class);
    }      
}
