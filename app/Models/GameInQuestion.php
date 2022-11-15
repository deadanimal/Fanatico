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
}
