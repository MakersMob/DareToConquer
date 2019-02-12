<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Section extends Model
{
    protected $fillable = [
    	'title', 'slug', 'content',
    ];

    public function frameworks()
    {
    	return $this->hasMany('DareToConquer\Framework');
    }

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}
