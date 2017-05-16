<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['price','new_price', 'options'];

    public function service()
    {
        return $this->belongsToMany('App\Models\Service','packet_service');
    }

    public function subscription()
    {
        return $this->hasMany('App\Models\Subscription');
    }

}
