<?php

namespace App\Services\Validations;

use Validator;
use Illuminate\Validation\Rule;

class UserProfileValidations
{
    /**
     * Validate for user profile info
     *
     * @param array $data
     * @return mixed
     */
    public static function updateUserProfile(array $data)
    {
        return Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'profileLogin' => 'required|string|max:250|unique:users,name,' . $data['user_id'],
            'profileEmail' => 'required|string|email|max:30|unique:users,email,' . $data['user_id'],
            'profileName' => 'nullable|string|max:250',
            'profileSurname' => 'nullable|string|max:250',
            'profileAddress' => 'nullable|string|max:250',
            'profileCountry' => 'nullable|string|max:50',
            'profileCity' => 'nullable|string|max:50',
            'profilePhone' => 'nullable|regex:/(0)[0-9]{9}/|unique:users_profiles,phone,' . $data['user_id']
        ]);
    }

    public static function changeUserPassword(array $data)
    {
        return Validator::make($data, [
            'profileOldPass' => 'required|string|min:6',
            'profileNewPass' => 'required|string|min:6|confirmed'
        ]);
    }
}
