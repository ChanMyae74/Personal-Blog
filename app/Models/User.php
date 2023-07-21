<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Doctrine\Deprecations\PHPUnit\VerifyDeprecations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public function isUser(): bool

    {
        return $this->role === 'user';
    }
    public function isEditor(): bool
    {
        return $this->role === 'editor';
    }
    public function isAuthor(): bool
    {
        return $this->role === 'author';
    }
    public function isAdministrator(): bool
    {
        return $this->role === 'admin';
    }

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'role'
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
    ];
}
