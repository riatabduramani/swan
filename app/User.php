<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\HasModelTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;
    use HasModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'phone', 'password', 'status', 'confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function potential()
    {
        return $this->hasMany('App\Models\Potential');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer');
    }
}
