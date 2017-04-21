<?php
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role';

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

    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role');
    }
}
