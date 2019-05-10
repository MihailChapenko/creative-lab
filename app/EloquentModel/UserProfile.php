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
                        ->join('countries', 'users_profiles.country', '=', 'countries.name')
                        ->select('user_id', 'first_name', 'last_name', 'address', 'city', 'countries.id as country_id', 'country',
                                 'phone', 'img_url', 'email', 'users.name as name')
                        ->where('users_profiles.user_id', '=', Auth::id());

        return $profile;
    }

    /**
     * Find user profile row in DB
     *
     * @param $id
     * @return mixed
     */
    public function updateOwnProfile($id)
    {
        return $this->where('user_id', '=', $id);
    }

}
