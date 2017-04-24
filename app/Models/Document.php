<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents';

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
    protected $fillable = ['name','description','extension','renamed'];

    public function customer()
    {
        return $this->belongsToMany('App\Models\Customer','customer_document');
    }

    public function createdby()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
