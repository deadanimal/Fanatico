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
        'question_id',
        'game_match_id',
        'token_id',
        'token_min_amount',
    ];

    public function match()
    {
        return $this->belongsTo(GameMatch::class);
    }  
    
    public function question()
    {
        return $this->belongsTo(GameInQuestion::class);
    }      

}
