<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Model
{
    protected $table = 'users_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'address', 'city', 'country', 'phone', 'img_url'
    ];

    /**
     * Return user profile info.
     *
     * @return array
     */
    public function getUserProfile()
    {
        $profile = $this->join('users', 'users_profiles.user_id', '=', 'users.id')
                        ->where('users_profiles.user_id', '=', Auth::id());

        return $profile;
    }

    public function updateOwnProfile($id)
    {
        return $this->where('user_id', '=', $id);
    }

}
