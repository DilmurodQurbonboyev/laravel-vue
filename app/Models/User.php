<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'mode',
        'layout',
        'sidebar_size',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userData(): HasOne
    {
        return $this->hasOne(UserData::class, 'userid');
    }

    public function userRoleLink(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'user_role_links');
    }

    public static function create($name, $email, $password): User
    {
        $user = new static();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        return $user;
    }
}
