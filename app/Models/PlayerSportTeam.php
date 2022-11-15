<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerSportTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'sport_team_id',
    ];      
}
