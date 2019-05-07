<?php

namespace App\Services\Validations;

use Validator;
use Illuminate\Validation\Rule;

class UserProfileValidations
{
    public static function updateUserProfile(array $data)
    {
        return Validator::make($data,[
            'user_id' => 'required|exists:users,id',
            'profileLogin' => 'required|string|max:250',
            'profileEmail' => 'required|string|email|max:30|unique:users,email,' .$data['user_id'],
            'profileName' => 'nullable|string|max:250',
            'profileSurname' => 'nullable|string|max:250',
            'profileAddress' => 'nullable|string|max:250',
            'profileCountry' => 'nullable|string|max:50',
            'profileCity' => 'nullable|string|max:50',
            'profilePhone' => 'nullable|regex:/(0)[0-9]{9}/|unique:users_profiles,phone,' .$data['user_id']
        ]);
    }
}
