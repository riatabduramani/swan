<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscription';

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
    protected $fillable = ['customer_id', 'packet_id', 'start', 'end'];

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function invoice(){
        return $this->belongsTo('App\Models\Invoice','invoice_id');
    }

    public function packet(){
        return $this->belongsTo('App\Models\Packet','packet_id');
    }

}