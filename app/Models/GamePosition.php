<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_match_id',
        'game_outcome_id',
        'user_id', 
        'token_id',
        'token_amount',           
    ];     
    
    public function match() {
        return $this->belongsTo(GameMatch::class, 'game_match_id');
    }   

    public function outcome() {
        return $this->belongsTo(GameOutcome::class, 'game_outcome_id');
    }      
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }       
}
