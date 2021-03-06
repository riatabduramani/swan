<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = ['body','commented_by','created_by','commentable_id','commentable_type'];
	/**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function createdby()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
