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
}
