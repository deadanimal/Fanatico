<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameInPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_in_question_id',
        'game_in_answer_id',
        'game_match_id',
        'token_id',
        'token_amount',
    ];    

    public function answer()
    {
        return $this->belongsTo(GameInAnswer::class);
    } 

    public function question()
    {
        return $this->belongsTo(GameInQuestion::class);
    }     
    
    public function match()
    {
        return $this->belongsTo(GameMatch::class);
    }   
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }     
}
