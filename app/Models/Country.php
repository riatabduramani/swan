<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name'];

    public function city()
    {
        return $this->hasMany('App\Models\City');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer');
    }

    public function district()
    {
        return $this->hasManyThrough(
            'App\Models\District', 'App\Models\City',
            'country_id', 'city_id', 'id'
        );
    }
}
