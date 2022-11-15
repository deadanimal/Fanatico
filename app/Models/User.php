<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'introducer_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'introducer_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function in_positions()
    {
        return $this->hasMany(GameInPosition::class);
    }     

    public function positions()
    {
        return $this->hasMany(GamePosition::class);
    }  

    public function purchases()
    {
        return $this->hasMany(TokenPurchase::class);
    }      

    public function balances()
    {
        return $this->hasMany(TokenBalance::class);
    }      
    
    
}
