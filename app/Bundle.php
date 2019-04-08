<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $fillable = ['name', 'price', 'description', 'slug'];

    public function courses()
    {
    	return $this->belongsToMany('DareToConquer\Course');
    }
}
