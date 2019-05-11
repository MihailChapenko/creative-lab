<?php

namespace App\Services\Validations;

use Validator;
use Illuminate\Validation\Rule;

class UserCreateValidations
{
    public static function createUser(array $data)
    {
        return Validator::make($data, [
           'userLogin' => 'required|string|max:250|unique:users,name',
           'userEmail' => 'required|string|email|max:30|unique:users,email',
        ]);
    }
}
