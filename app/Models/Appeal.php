<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Appeal extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'address',
        'latitude',
        'longitude',
        'description',
        'issues_id',
    ];

    public function user(){
        return $this->belongsToMany('App\Models\User',
            'users',
            'user_id',
            'id');
    }

    public function issue(){
        return $this->belongsToMany('App\Models\Issue',
            'issues',
            'issues_id',
            'id');
    }
}
