<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Archive extends Model
{

    protected $fillable = [
    	'title', 'email', 'slug',
    ];

    public function setEmailAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['email'] = $markdown->toHTML($value);
    }
}