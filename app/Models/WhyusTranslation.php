<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyusTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','description'];
}
