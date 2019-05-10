<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    /**
     * Return list of searchable cities by country
     *
     * @param $data
     * @return mixed
     */
    public function getCitiesList($data)
    {
        return $this->where('country_id', '=', $data['countryId'])
                    ->where('name', 'like', $data['city'] . '%');
    }

    /**
     * Return searchable city by country and name
     *
     * @param $data
     * @return mixed
     */
    public function searchCity($data)
    {
        return $this->where('country_id', '=', $data['countryId'])
                    ->where('name', 'like', $data['city'] . '%')
                    ->orWhere('name', '=', $data['city']);
    }
}
