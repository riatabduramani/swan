<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

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
    //protected $fillable = ['name', 'description'];

    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name', 'description'];

    public function packet()
    {
        return $this->belongsToMany('App\Models\Packet','packet_service');
    }

}
