<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameInAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_in_question_id',
        'game_match_id',
        'token_id',
        'token_min_amount',
    ]; 
    
    public function question()
    {
        return $this->belongsTo(GameInQuestion::class, 'game_in_question_id');
    }     
    
    public function positions()
    {
        return $this->hasMany(GameInPosition::class);
    }     

}
