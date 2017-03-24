<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['price', 'options'];

    public function service()
    {
        return $this->belongsToMany('App\Models\Service','packet_service');
    }

}
