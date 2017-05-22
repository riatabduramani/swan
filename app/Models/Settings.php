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

    protected $fillable = [
							'company_name',
							'company_slogan_sq',
							'company_slogan_en',
							'company_logo',
							'company_shortdescription',
							'company_keywords',
							'address_sq',
							'address_en',
							'mob',
							'mob1',
							'phone',
							'phone1',
							'fax',
							'email',
							'email1',
							'facebook',
							'youtube',
							'linkedin',
							'googleplus',
							'instagram',
							'currency',
							'googleanalytics',
							'googlemap'
							];

}
