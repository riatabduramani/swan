<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelTrait;

class Invoice extends Model
{
    use HasModelTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoice';

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
			'invoice_type',
			'service_id',
			'invoice_date',
			'due_date',
			'end_date',
			'description',
			'customer_id',
			'payment_method',
			'payment_status',
			'total_sum',
            'months',
            'price',
            'price_mkd',
            'total_sum_mkd',
			'created_by',
			'updated_by',
    	];

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function invoice(){
        return $this->belongsTo('App\Models\Subscription','invoice_id');
    }
    
    public function customservice()
    {
        return $this->belongsTo('App\Models\CustomerServices','service_id');
    }

    public function packetservice()
    {
        return $this->belongsTo('App\Models\Packet','service_id');
    }

}
