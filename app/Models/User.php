<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'site_id',
        'country_code',
        'phone_number',
        'device_token',
        'api_token',
        'device_type',
        'active',
        'user_otp',
        'api_token_expires_at',
        'profile_image',
        'company_name',
        'otp_verify',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'site_id' => 'array',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function userRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
}
