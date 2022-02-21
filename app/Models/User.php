<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    ];

    // One User can have many Reports.
    public function report_user()
    {
        return $this->hasMany(ReportUser::class);
    }

    // User Menu Image, Description and Profile URL.
    public function adminlte_image()
    {
        // return 'https://picsum.photos/300/300';
        return "vendor/adminlte/dist/img/user2.png";
    }

    public function adminlte_desc()
    {
        return "I am a Backend Web Developer in Larawel & Livewire";
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}
