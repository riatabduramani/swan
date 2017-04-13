<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelTrait;

class Customer extends Model
{
    use HasModelTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer';

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
    protected $fillable = [
    	'user_id',
		'phone_out',
		'phone_in',
		'address_out',
		'postal_out',
		'city',
		'country_id',
		'address_in',
		'city_in_id',
		'district_in_id',
		'country_in_id',
		'emergencycontact',
		'emergencyphone',
		'created_by',
		'updated_by'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function cities(){
        return $this->belongsTo('App\Models\City','city_in_id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District','district_in_id');
    }

    public function createdby(){
        return $this->belongsTo('App\User','created_by');
    }

    public function countryin(){
        return $this->belongsTo('App\Models\Country','country_in_id');
    }

    public function countryout(){
        return $this->belongsTo('App\Models\Country','country_id');
    }

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }
}


