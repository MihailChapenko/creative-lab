<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function getCitiesList($id)
    {
        return $this->where('country_id', '=', $id);
    }
}
