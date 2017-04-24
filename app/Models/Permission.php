<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
    protected $fillable = ['name','display_name','description'];

    public function role()
    {
        return $this->belongsToMany('App\Models\Role','permission_role');
    }
}