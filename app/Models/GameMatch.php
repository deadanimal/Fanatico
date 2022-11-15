<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'planned_start_datetime',
        'planned_end_datetime',
        'actual_start_datetime',
        'actual_end_datetime',  
        'user_id',      
    ];     
    
    public function teams()
    {
        return $this->belongsToMany(SportTeam::class);
    }   
    
    public function outcomes()
    {
        return $this->hasMany(GameOutcome::class);
    }   

    public function questions()
    {
        return $this->hasMany(GameInQuestion::class);
    }   

    public function answers()
    {
        return $this->hasMany(GameInAnswer::class);
    }    

    public function in_positions()
    {
        return $this->hasMany(GameInPosition::class);
    }     

    public function positions()
    {
        return $this->hasMany(GamePosition::class);
    }        
}
