<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credits extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'credits';

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
						'amount',
						'balance',
						'notes',
						'customer_id',
						'created_by',
						'updated_by'
						];
	
	public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

}
