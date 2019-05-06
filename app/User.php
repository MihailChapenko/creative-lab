<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return user info.
     *
     * @return array
     */
    public function getUserInfo()
    {
        $userInfo = $this->join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
            ->where('users.id', '=', Auth::id())
            ->select('users.id', 'users.name', 'users_profiles.img_url');

        return $userInfo;
    }

    /**
     * Return users list.
     *
     * @return array
     */
    public function getUsersList()
    {
        $usersList = $this->join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
            ->select('users_profiles.user_id', 'users.name', 'users.email', 'users_profiles.phone',
                'users_profiles.country', 'users_profiles.city', 'users_profiles.img_url');

        return $usersList;
    }
}
