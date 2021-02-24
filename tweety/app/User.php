<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/40?u=' . $this->email;
    }

    public function timeline()
    {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id', $ids)
            ->latest()
            ->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
}
