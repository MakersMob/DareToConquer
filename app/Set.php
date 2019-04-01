<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Set extends Model
{
    protected $fillable = ['title', 'challenge_id', 'description'];

    public function challenge()
    {
    	return $this->belongsTo('DareToConquer\Challenge');
    }

    public function exercises()
    {
    	return $this->hasMany('DareToConquer\Exercise');
    }

    public function setDescriptionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['description'] = $markdown->toHTML($value);
    }
}
