<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameInAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'user_id',
        'game_in_question_id',
        'game_match_id',
        'token_id',
        'token_min_amount',
    ];

    public function game_match()
    {
        return $this->belongsTo(GameMatch::class);
    }  
    
    public function question()
    {
        return $this->belongsTo(GameInQuestion::class);
    }     
    
    public function positions()
    {
        return $this->hasMany(GameInPosition::class);
    }     

}
