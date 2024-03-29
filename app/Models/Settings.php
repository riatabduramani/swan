<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = [
    						'company_name',
							'company_slogan',
							'company_shortdescription',
							'address',
							];

}
