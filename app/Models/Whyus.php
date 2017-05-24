<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whyus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'whyus';

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

    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['title', 'description'];
}
