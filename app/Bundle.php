<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Bundle extends Model
{
    protected $fillable = ['name', 'price', 'description', 'slug'];

    public function courses()
    {
    	return $this->belongsToMany('DareToConquer\Course');
    }

    public function setDescriptionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['description'] = $markdown->toHTML($value);
    }
}
