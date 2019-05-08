<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function searchCountry($name)
    {
        return $this->where('name', 'like', $name . '%');
    }
}
