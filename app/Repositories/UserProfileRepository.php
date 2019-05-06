<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class UserProfileRepository extends Repository
{
    public function model()
    {
        return 'App\Repositories\EloquentModel\UserProfile';
    }
}
