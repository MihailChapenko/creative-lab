<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return 'App\User';
    }

    public function getUsersList()
    {
        $usersList = $this->model()::join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
                            ->select('users_profiles.user_id', 'users.name', 'users.email', 'users_profiles.phone',
                                    'users_profiles.country', 'users_profiles.city');

        return $usersList;
    }
}
