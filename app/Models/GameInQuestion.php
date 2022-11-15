<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameInQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'user_id',
        'game_match_id',
    ];    

    public function match()
    {
        return $this->belongsTo(GameMatch::class);
    }    
    
    public function answers()
    {
        return $this->hasMany(GameInAnswer::class);
    }    
    
    public function positions()
    {
        return $this->hasMany(GameInPosition::class);
    }     
}
