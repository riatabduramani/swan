<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagesTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['about','vision', 'mission'];
}
