<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'todolist';

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
						'title',
						'description',
						'user_id',
						'customer_id',
						'created_by',
						'updated_by',
                        'done',
						'duedate',
						'created_at',
						'updated_at'
						];

    public function assignedto()
    {
        return $this->belongsTo('App\User','user_id');
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
