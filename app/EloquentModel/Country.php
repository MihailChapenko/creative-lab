<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    /**
     * return searchable country
     *
     * @param $name
     * @return mixed
     */
    public function searchCountry($name)
    {
        return $this->where('name', 'like', $name . '%')
                    ->orWhere('name', '=', $name);
    }
}
