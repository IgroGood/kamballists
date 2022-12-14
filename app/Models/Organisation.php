<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Organisation extends Authenticatable
{
    use HasFactory;

    //мляяя забыл
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organisation_name',
        'address',
        'description',
        'latitude',
        'longitude',
        'status',
    ];

    public function issue(){
        return $this->belongsToMany('App\Models\Issue',
            'issues',
            'status',
            'id');
    }

    public function reviews(){
        return $this->belongsToMany('App\Models\Appeal',
            'appeals_organisations',
            'organisations_id',
            'appeals_id');
    }


}
