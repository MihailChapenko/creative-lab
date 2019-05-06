<?php

namespace App\Repositories\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'address', 'city', 'country', 'phone', 'img_url'
    ];
}
