<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // jodi Role model use korcho
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // =========================
    // Add these methods inside the User class
    // =========================

    public function roleRelation()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isAdmin(): bool
    {
        return $this->roleRelation?->name === 'admin' || $this->roleRelation?->name === 'superadmin';
    }

    public function isSuperAdmin(): bool
    {
        return $this->roleRelation?->name === 'superadmin';
    }
}
