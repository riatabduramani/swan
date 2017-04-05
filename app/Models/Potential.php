<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potential extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'potential_customer';

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
    protected $fillable = ['name', 'surname', 'phone', 'email', 'district', 'customer_status_id', 'comment_id', 'created_by','updated_by'];

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\CustomerStatus','customer_status_id');
    }

    public function createdby()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function updatedby()
    {
        return $this->belongsTo('App\User','updated_by');
    }

}