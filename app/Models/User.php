<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function stands()
    {
        return $this->hasMany(Stand::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return formatDate($value);
    }

    public function scopeisTrackable($query)
    {
        return $query->role(['driver', 'sale-representative'])->get();
    }
}
