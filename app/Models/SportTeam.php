<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'user_id',
    ];      

    public function matches()
    {
        return $this->belongsToMany(GameMatch::class);
    }    
    
    public function players()
    {
        return $this->belongsToMany(Player::class);
    }      
}
