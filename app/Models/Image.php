<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [    
        'path', 
        'user_id',
        'taggable_type',
        'taggable_id',  
        'title',
        'caption'         
    ];   
    
    public function taggable()
    {
        return $this->morphTo();
    }    
}
