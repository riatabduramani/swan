<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerServices extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_service';

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
    	'name',
    	'description',
    	'created_by',
		'updated_by'
    	];

    public function invoice(){
        return $this->belongsTo('App\Models\Invoice');
    }
}
